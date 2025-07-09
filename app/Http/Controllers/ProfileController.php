<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show(): View
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $rules = [
            'name' => 'required|max:255|string',
            'username' => 'required|alpha_dash|string|max:255|unique:users,username,' . $user->id,
            'divisi' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['confirmed', Rules\Password::defaults()];
        }

        $request->validate($rules);

        // Update user data
        $user->name = $request->name;
        $user->username = $request->username;
        $user->divisi = $request->divisi;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Handle foto upload jika ada
        if ($request->hasFile('picture')) {
            // Hapus foto lama jika bukan default
            if ($user->foto && $user->foto !== 'profile.jpg') {
                File::delete(public_path('assets/images/pengguna/' . $user->foto));
            }

            // Simpan foto baru
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/pengguna'), $filename);

            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    }
}
