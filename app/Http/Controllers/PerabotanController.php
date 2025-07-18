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
use Illuminate\Support\Facades\Storage;
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
            'kategori' => 'required|exists:kategoris,id',
            'tahun_pengadaan' => 'required|numeric|min:1',
            'lokasi' => 'required|exists:lokasis,id',
            'keterangan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $kode = $request->kode ?: 'PB-' . rand(1000, 9999);
        while (Perabotan::where('kode', $kode)->exists()) {
            $kode = 'PB-' . rand(1000, 9999);
        }

        $foto_name = '';
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $request->foto->getClientOriginalName());
$request->foto->storeAs('public/perabotan', $filename);

            $foto_name = $filename;
        }

        Perabotan::create([
            'kode' => $kode,
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
        abort_unless(auth()->user()->role === 'admin', 403);

        return view('inventory.perabotan.form', [
            'perabotan' => $perabotan,
            'kategoris' => Kategori::orderBy('nama_kategori')->get(),
            'lokasis' => Lokasi::orderBy('nama_lokasi')->get(),
            'type' => 'edit'
        ]);
    }

    public function update(Request $request, Perabotan $perabotan): RedirectResponse
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $request->validate([
            'kode' => 'required|string|max:255|unique:perabotans,kode,' . $perabotan->id,
            'nama' => 'required|string|max:255|unique:perabotans,nama,' . $perabotan->id,
            'kategori' => 'required|exists:kategoris,id',
            'tahun_pengadaan' => 'required|numeric|min:1',
            'lokasi' => 'required|exists:lokasis,id',
            'keterangan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        if ($request->hasFile('foto') && $perabotan->foto) {
    Storage::delete('public/perabotan/' . $perabotan->foto);
}

        $nama_foto = $perabotan->foto;
        if ($request->hasFile('foto')) {
            $filename = time() . '.' . $request->foto->extension();
        $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $request->foto->getClientOriginalName());
        $request->foto->storeAs('public/perabotan', $filename);

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
        abort_unless(auth()->user()->role === 'admin', 403);

        if ($perabotan->foto) {
            File::delete(public_path('assets/images/items/' . $perabotan->foto));
        }

        $perabotan->delete();

        return redirect()->route('perabotan.index')->with('status', 'Perabotan berhasil dihapus');
    }

 public function scan(Request $request)
{
    $url = $request->kode;

    // Ambil ID dari URL
    $id = Str::after($url, '/perabotan/detail/');

    if (!is_numeric($id)) {
        return response()->json(['status' => 'error', 'message' => 'ID tidak valid']);
    }

    $perabot = Perabotan::find($id);

    if ($perabot) {
        return response()->json([
            'status' => 'success',
            'url' => route('perabotan.public.detail', ['id' => $perabot->id])
        ]);
    }

    return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan']);
}


    public function detailByKode($kode)
    {
        $perabotan = Perabotan::where('kode', $kode)->firstOrFail();
        $qrCode = QrCode::format('svg')->size(200)->generate(
            route('perabotan.public.detail', ['id' => $perabotan->id])
        );

        return view('inventory.perabotan.detail', compact('perabotan', 'qrCode'));
    }

    public function qrcodeByKode($kode)
    {
        $perabotan = Perabotan::where('kode', $kode)->firstOrFail();
        $qrCode = QrCode::format('svg')->size(200)->generate(
            route('perabotan.public.detail', ['id' => $perabotan->id])
        );

        return view('inventory.perabotan.qrcode', compact('perabotan', 'qrCode'));
    }

    public function cetakqr($kode)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $perabotan = Perabotan::where('kode', $kode)->firstOrFail();
        $qrCode = QrCode::size(200)->generate(
            route('perabotan.public.detail', ['id' => $perabotan->id])
        );

        return view('inventory.perabotan.cetakqr', compact('perabotan', 'qrCode'));
    }

    public function cetakqrById($id)
{
    abort_unless(auth()->user()->role === 'admin', 403);

    $perabotan = Perabotan::findOrFail($id);
    $qrCode = QrCode::size(200)->generate(
        route('perabotan.public.detail', ['id' => $perabotan->id])
    );

    return view('inventory.perabotan.cetakqr', compact('perabotan', 'qrCode'));
}


    public function export(Request $request)
    {
        $type = $request->get('type');

        if ($type === 'xlsx') {
            // Implement Excel export
        } elseif ($type === 'pdf') {
            // Implement PDF export
        } else {
            return redirect()->back()->with('status', 'Tipe export tidak dikenali');
        }
    }

    public function show($kode)
    {
        $perabotan = Perabotan::where('kode', $kode)->firstOrFail();
        $qrCode = QrCode::format('svg')->size(200)->generate(
            route('perabotan.public.detail', ['id' => $perabotan->id])
        );

        return view('inventory.perabotan.show', compact('perabotan', 'qrCode'));
    }

    public function generateQrCode(Request $request)
    {
        $kode = $request->query('kode');
        $perabotan = Perabotan::where('kode', $kode)->first();

        if (!$perabotan) {
            return response()->json(['status' => 'error', 'message' => 'Kode tidak ditemukan.']);
        }

        try {
            $qr = QrCode::size(200)->generate(
                route('perabotan.public.detail', ['id' => $perabotan->id])
            );

            return response()->json(['status' => 'success', 'image' => $qr]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'QR Code gagal dibuat: ' . $e->getMessage()
            ]);
        }
    }

    public function publicDetail($id)
    {
        $perabotan = Perabotan::findOrFail($id);
        $qrCode = QrCode::format('svg')->size(200)->generate(
            route('perabotan.public.detail', ['id' => $perabotan->id])
        );

        return view('inventory.perabotan.public_detail', compact('perabotan', 'qrCode'));
    }
}
