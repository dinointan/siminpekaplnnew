<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class CategoryController extends Controller
{
  /**
   * @param Request $request
   * @param Kategori $Kategori
   * @return void
   */

  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('inventory.kategori.index', [
      'user' => auth()->user(),
      'perabotan' => Kategori::orderBy('nama_kategori')->get(),

      'type' => 'show'
    ]);
  }


  /**
   * Display the specified resource.
   */
  public function show(Kategori $kategori): string
  {
    return json_encode($kategori);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('inventory.kategori.form', [
      'kategoris' => Kategori::orderBy('nama_kategori')->get(),
      'type' => 'create'
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    $request->validate([
      'nama_kategori' => 'required|string|max:255|',
    ]);

    $kategori = Kategori::create([
      'nama_kategori' => $request->nama_kategori,
    ]);

    return redirect()->route('kategori.index')->with('status', 'Kategori  berhasil ditambahkan');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Kategori $kategori): View
  {
    return view('inventory.kategori.form', [
      'kategori' => $kategori,
      'type' => 'edit'
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Kategori $kategori): RedirectResponse
  {
    $request->validate([
      'nama_kategori' => 'required|string|max:255|',
    ]);

    $kategori->update([
      'nama_kategori' => $request->nama_kategori,
    ]);

    return redirect()->route('kategori.index')->with('status', 'Kategori berhasil diperbarui.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Kategori $kategori): RedirectResponse
  {
    try {
      // Hapus data kategori
      $kategori->delete();

      // Redirect dengan pesan sukses
      return redirect()->route('kategori.index')->with('status', 'Kategori berhasil dihapus.');
    } catch (\Exception $e) {
      // Jika gagal, redirect dengan pesan error
      return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
    }
  }

}
