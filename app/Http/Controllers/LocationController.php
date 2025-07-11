<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
  /**
   * @param Request $request
   * @param Lokasi $Lokasi
   * @return void
   */

  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('inventory.lokasi.index', [
      'pengguna' => auth()->user(),
      'perabotan' => Lokasi::with(['mutasiDari', 'mutasiKe'])->orderBy('nama_lokasi')->get(),

      'kategori' => Kategori::all(),
      'lokasi' => Lokasi::all(),
      'type' => 'index'
    ]);
  }
  /**
   * Display the specified resource.
   */
  public function detail(Lokasi $lokasi): View
  {
    return view('inventory.lokasi.table', [
      'lokasi' => $lokasi,
      'kategori' => Kategori::all(),
      'type' => 'show'
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(Lokasi $lokasi): string
  {
    return json_encode($lokasi);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('inventory.lokasi.form', [
      'type' => 'create',
      'kategori' => Kategori::all(), // jika view butuh data kategori
      'lokasi' => new Lokasi(), // untuk menghindari error $lokasi di view
    ]);
  }


  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'nama_lokasi' => 'required|string|max:255|unique:lokasis,nama_lokasi',
    ]);


    $item = Lokasi::create([
      "id_lokasi" => $request->id,
      'nama_lokasi' => $request->nama_lokasi,
    ]);

    return redirect()->route('lokasi.index')->with('status', 'Lokasi  berhasil ditambahkan');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Lokasi $lokasi): View
  {
    return view('inventory.lokasi.form', [
      'lokasi' => $lokasi,
      'kategori' => Kategori::all(),
      'type' => 'edit'
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Lokasi $lokasi): RedirectResponse
  {
    $request->validate([

      'nama_lokasi' => [
        'required',
        'string',
        'max:255',
        Rule::unique('lokasis', 'nama_lokasi')->ignore($lokasi->id, 'id')
      ],
    ]);

    $lokasi->update([
      'nama_lokasi' => $request->nama_lokasi,
    ]);

    return redirect()->route('lokasi.index')->with('status', 'Lokasi berhasil diperbarui');
  }

  public function destroy(Lokasi $lokasi): RedirectResponse
  {
    // Hapus file foto jika ada dan bukan default
    if ($lokasi->foto && $lokasi->foto !== 'default.png') {
      $path = public_path('assets/images/items/' . $lokasi->foto);
      if (file_exists($path)) {
        unlink($path);
      }
    }

    $lokasi->delete();

    return redirect()->route('lokasi.index')->with('status', 'Lokasi berhasil dihapus');
  }
}