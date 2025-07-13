<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Exports\PenggunaExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data dari model User

        return view('pengguna.index', [
            'user' => $users
        ]);
    }

    public function create()
    {
        $type = 'create';
        $pengguna = new User();

        return view('pengguna.form', [
            'type' => $type,
            'pengguna' => $pengguna,
        ]);
    }

    public function edit(User $pengguna)
    {
        return view('pengguna.edit', [
            'type' => 'edit',
            'pengguna' => $pengguna
        ]);
    }
    public function update(Request $request, User $pengguna)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $pengguna->id,
            'email' => 'required|email|unique:users,email,' . $pengguna->id,
            'role' => 'required|in:admin,pegawai',
            'divisi' => 'required|in:K3 Lingkungan dan Keamanan,Pelayanan Pelanggan dan Administrasi,Sales Retail,Teknik,Transaksi Energi Listrik',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];


        if ($request->filled('password')) {
            $rules['password'] = 'nullable|string|min:6|confirmed';
        }

        $validated = $request->validate($rules);

        $foto = $pengguna->foto; // Default: pakai foto lama

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($pengguna->foto && File::exists(public_path('assets/images/pengguna/' . $pengguna->foto))) {
                // File::delete(public_path('assets/images/pengguna/' . $pengguna->foto));
                Storage::delete('public/pengguna/' . $pengguna->foto);
            }

            $file = $request->file('foto');
            $originalName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
            $filename = time() . '_' . $originalName;
            // $file->move(public_path('assets/images/pengguna'), $filename);
            $file->storeAs('public/pengguna', $filename);
            $foto = $filename;
        }

        $pengguna->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => $request->filled('password') ? Hash::make($request->password) : $pengguna->password,
            'role' => $validated['role'],
            'divisi' => $validated['divisi'],
            'foto' => $foto,
        ]);


        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,pegawai',
            'divisi' => 'required|in:K3 Lingkungan dan Keamanan,Pelayanan Pelanggan dan Administrasi,Sales Retail,Teknik,Transaksi Energi Listrik',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $originalName = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
            $filename = time() . '_' . $originalName;
           $file->storeAs('public/pengguna', $filename);
            $foto = $filename;
        }

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            'divisi' => $validated['divisi'],
            'foto' => $foto,
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function destroy(User $pengguna)
    {
        // Jika ada file foto, hapus dari direktori
        if ($pengguna->foto && $pengguna->foto !== '') {
           Storage::delete('public/pengguna/' . $pengguna->foto);
        }

        try {
            $pengguna->delete();

            return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            // Jika gagal, redirect dengan pesan error
            return redirect()->route('kategori.index')->with('error', 'Terjadi kesalahan saat menghapus kategori.');
        }

    }

    public function export(Request $request)
    {
        $type = $request->query('type', 'xlsx');

        if (!in_array($type, ['xlsx', 'csv', 'xls'])) {
            return redirect()->back()->with('status', 'Tipe export tidak valid.');
        }

        return Excel::download(new PenggunaExport, 'pengguna.' . $type);
    }
}