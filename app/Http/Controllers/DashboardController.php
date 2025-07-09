<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\MutasiPerabotan;
use App\Models\Perabotan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // logger('Dashboard dikunjungi oleh: ' . (auth()->check() ? auth()->user()->username : 'Guest'));
        return view('dashboard', [
            'total_perabotans' => Perabotan::all()->count(),
            'total_kategoris' => Kategori::all()->count(),
            'total_lokasis' => Lokasi::all()->count(),
            'total_mutasi_perabotans' => MutasiPerabotan::all()->count(),
        ]);

    }
    public function dashboard()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        return view('dashboard', ['user' => $user]);
    }
}
