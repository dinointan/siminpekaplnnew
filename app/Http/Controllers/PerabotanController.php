<?php

namespace App\Http\Controllers;

use App\Models\Perabotan;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Milon\Barcode\DNS1D;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;


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

  public function show(Perabotan $perabotan): string
  {
    return json_encode($perabotan);
  }

  public function create(): View
  {
    return view('inventory.perabotan.form', [
      'lokasis' => Lokasi::orderBy('nama_lokasi')->get(), // ini penting!
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


    $foto_name = 'default.png';
    if ($request->hasFile('foto')) {
      $filename = time() . '.' . $request->foto->extension();
      $request->foto->move(public_path('/assets/images/furnitures/default.png'), $filename);
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
    return view('inventory.perabotan.form', [
      'perabotan' => $perabotan,
      'kategoris' => Kategori::orderBy('nama_kategori')->get(),
      'lokasis' => Lokasi::orderBy('nama_lokasi')->get(),
      'type' => 'edit'
    ]);

  }


  public function update(Request $request, Perabotan $perabotan): RedirectResponse
  {
    $request->validate([
      'kode' => 'required|string|max:255|unique:perabotans,kode,' . $perabotan->id,
      'nama' => 'required|string|max:255|unique:perabotans,nama,' . $perabotan->id,
      'kategori' => 'required|exists:kategoris,id',
      'tahun_pengadaan' => 'required|numeric|min:1',
      'lokasi' => 'required|exists:lokasis,id_lokasi',
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
    if ($perabotan->foto && $perabotan->foto !== 'default.png') {
      File::delete(public_path('assets/images/items/' . $perabotan->foto));
    }

    $perabotan->delete();

    return redirect()->route('perabotan.index')->with('status', 'Perabotan berhasil dihapus');
  }
  public function scan(Request $request)
  {
    $kode = $request->kode;

    $perabotan = Perabotan::where('kode', $kode)->first(); // ✅ ambil satu data

    if ($perabotan) {
      return response()->json([
        'status' => 'success',
        'data' => [
          'nama' => $perabotan->nama,
          'lokasi' => $perabotan->lokasi->nama_lokasi ?? '-',
          'url_detail' => route('perabotan.show', $perabotan->id)
        ]
      ]);
    } else {
      return response()->json([
        'status' => 'error',
        'message' => 'Perabot tidak ditemukan'
      ]);
    }
  }
  public function getQrCode(Request $request)
  {
    $kode = $request->kode;

    if (!$kode) {
      Log::error('Kode perabotan tidak ditemukan di request');
      return response()->json(['error' => 'Kode tidak ditemukan'], 400);
    }

    try {
      $image = base64_encode(QrCode::format('png')->size(200)->generate($kode));

      return response()->json([
        'kode' => $kode,
        'image' => "data:image/png;base64,{$image}"
      ]);
    } catch (\Exception $e) {
      Log::error('QR Code generation failed: ' . $e->getMessage());
      return response()->json(['error' => 'QR Code gagal dibuat'], 500);
    }
  }


  public function export(Request $request)
  {
    $type = $request->get('type');

    if ($type === 'excel') {
      // proses export Excel
    } elseif ($type === 'pdf') {
      // proses export PDF
    } else {
      return redirect()->back()->with('status', 'Tipe export tidak dikenali');
    }
  }
}