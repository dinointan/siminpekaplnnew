<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\Perabotan;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class PerabotanController extends Controller
{
  public function index(): View
  {
    $perabotans = Perabotan::with(['kategori', 'mutasi_perabotan'])
      ->get()
      ->sortBy(fn($item) => $item->kategori->nama_kategori ?? '');

    return view('inventory.perabotan.index', [
      'pengguna' => auth()->user(),
      'perabotans' => $perabotans,
      'type' => 'show'
    ]);
  }

  // public function show(Perabotan $perabotan): string
  // {
  // return json_encode($perabotan);
  // }

  public function create(): View
  {
    return view('inventory.perabotan.form', [
      'perabotan' => null,
      'lokasis' => Lokasi::orderBy('nama_lokasi')->get(),
      'kategoris' => Kategori::all(),
      'type' => 'create',
    ]);
  }


  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'kode' => 'required|string|max:255|unique:perabotans,kode',
      'nama' => 'required|string|max:255|unique:perabotans,nama',
      'kategori' => 'required|exists:kategoris,id', // id pada tabel kategoris
      'tahun_pengadaan' => 'required|numeric|min:1',
      'lokasi' => 'required|exists:lokasis,id', // id pada tabel lokasis
      'keterangan' => 'required|string|max:255',
      'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
    ]);
    $kode = $request->kode;
    if (!$kode) {
      $kode = 'PB-' . rand(1000, 9999);
      while (Perabotan::where('kode', $kode)->exists()) {
        $kode = 'PB-' . rand(1000, 9999); // Pastikan unik
      }
    }


    $foto_name = '';
    if ($request->hasFile('foto')) {
      $filename = time() . '.' . $request->foto->extension();
      $request->foto->move(public_path('/assets/images/items'), $filename);
      $foto_name = $filename;
    }

    Perabotan::create([
      'kode' => $request->kode,
      'nama' => $request->nama,
      'kategori_id' => $request->kategori,
      'tahun_pengadaan' => $request->tahun_pengadaan,
      'lokasi_id' => $request->lokasi,
      'keterangan' => $request->keterangan,
      'foto' => $foto_name
    ]);


    return redirect()->route('perabotan.index')->with('status', 'Perabotan berhasil ditambahkan');
  }

  public function edit(Perabotan $perabotan): View
  {
    if (auth()->user()->role !== 'admin') {
      abort(403, 'Akses ditolak.');
    }

    return view('inventory.perabotan.form', [
      'perabotan' => $perabotan,
      'kategoris' => Kategori::orderBy('nama_kategori')->get(),
      'lokasis' => Lokasi::orderBy('nama_lokasi')->get(),
      'type' => 'edit'
    ]);
  }


  public function update(Request $request, Perabotan $perabotan): RedirectResponse
  {
    if (auth()->user()->role !== 'admin') {
      abort(403, 'Akses ditolak.');
    }
    $request->validate([
      'kode' => 'required|string|max:255|unique:perabotans,kode,' . $perabotan->id,
      'nama' => 'required|string|max:255|unique:perabotans,nama,' . $perabotan->id,
      'kategori' => 'required|exists:kategoris,id',
      'tahun_pengadaan' => 'required|numeric|min:1',
      'lokasi' => 'required|exists:lokasis,id',
      'keterangan' => 'required|string|max:255',
      'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
    ]);



    $nama_foto = $perabotan->foto;
    if ($request->hasFile('foto')) {
      $filename = time() . '.' . $request->foto->extension();
      $request->foto->move(public_path('assets/images/items'), $filename);
      $nama_foto = $filename;
    }

    $perabotan->update([
      'kode' => $request->kode,
      'nama' => $request->nama,
      'kategori_id' => $request->kategori,
      'tahun_pengadaan' => $request->tahun_pengadaan,
      'lokasi_id' => $request->lokasi,
      'keterangan' => $request->keterangan,
      'foto' => $nama_foto
    ]);

    return redirect()->route('perabotan.index')->with('status', 'Perabotan berhasil diperbarui');
  }

  public function destroy(Perabotan $perabotan): RedirectResponse
  {
    if (auth()->user()->role !== 'admin') {
      abort(403, 'Akses ditolak.');
    }
    if ($perabotan->foto && $perabotan->foto !== '') {
      File::delete(public_path('assets/images/items/' . $perabotan->foto));
    }

    $perabotan->delete();

    return redirect()->route('perabotan.index')->with('status', 'Perabotan berhasil dihapus');
  }
  public function scan(Request $request)
  {
    $url = $request->kode;
    $kode = Str::before(Str::after($url, '/perabotan/'), '/detail');
    $perabot = Perabotan::where('kode', $kode)->first();

    if ($perabot) {
      return response()->json([
        'status' => 'success',
        'url' => route('perabotan.public.detail', ['kode' => $perabot->kode])
      ]);
    }

    return response()->json([
      'status' => 'error',
      'message' => 'Data tidak ditemukan'
    ]);
  }


  public function detailByKode($kode)
  {
    $perabotan = Perabotan::where('kode', $kode)->first();

    $url = route('perabotan.public.detail', ['kode' => $perabotan->kode]);

    $qrCode = QrCode::format('svg')->size(300)->generate($url);


    // if (!$perabotan) {
    //   return response()->json(['error' => 'Kode tidak ditemukan'], 404);
    // }

    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(200)->generate($perabotan->kode);

    return view('inventory.perabotan.detail', [
      'perabotan' => $perabotan,
      'qrCode' => $qrCode
    ]);
  }

  public function qrcodeByKode($kode)
  {
    $perabotan = Perabotan::where('kode', $kode)->firstOrFail();

    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(300)->generate($perabotan->kode);

    return view('inventory.perabotan.qrcode', [
      'perabotan' => $perabotan,
      'qrCode' => $qrCode
    ]);
  }

  public function cetakqr($kode)
  {
    if (auth()->user()->role !== 'admin') {
      abort(403, 'Akses ditolak.');
    }
    $perabotan = Perabotan::where('kode', $kode)->firstOrFail();

    $qrCode = QrCode::size(200)->generate($perabotan->kode);

    return view('inventory.perabotan.cetakqr', compact('perabotan', 'qrCode'));
  }

  public function export(Request $request)
  {
    $type = $request->get('type');

    if ($type === 'xlsx') {
      // proses export Excel
    } elseif ($type === 'pdf') {
      // proses export PDF
    } else {
      return redirect()->back()->with('status', 'Tipe export tidak dikenali');
    }
  }
  public function show($kode)
  {
    $perabotan = Perabotan::where('kode', $kode)->firstOrFail();

    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(200)->generate($perabotan->kode);

    return view('inventory.perabotan.show', compact('perabotan', 'qrCode'));
  }
  public function generateQrCode(Request $request)
  {
    $kode = $request->query('kode');

    if (!$kode) {
      return response()->json([
        'status' => 'error',
        'message' => 'Kode tidak ditemukan.'
      ]);
    }

    try {
      $qr = QrCode::size(200)->generate($kode);

      return response()->json([
        'status' => 'success',
        'image' => $qr
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'status' => 'error',
        'message' => 'QR Code gagal dibuat: ' . $e->getMessage()
      ]);
    }
  }
  public function showPublic($kode)
  {
    $perabotan = Perabotan::where('kode', $kode)->firstOrFail();

    $qrCode = QrCode::format('svg')->size(200)->generate($perabotan->kode);

    return view('inventory.perabotan.public_detail', [
      'perabotan' => $perabotan,
      'qrCode' => $qrCode
    ]);
  }
  public function publicDetail($kode)
  {
    $perabotan = Perabotan::where('kode', $kode)->firstOrFail();
    $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(200)->generate($perabotan->kode);

    return view('inventory.perabotan.public_detail', compact('perabotan', 'qrCode'));
  }


}