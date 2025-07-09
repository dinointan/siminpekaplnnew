<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perabotan; // Sesuaikan dengan model perabot kamu

class ScanController extends Controller
{
    public function index()
    {
        return view('scan.index'); // Tampilan halaman scan
    }

    public function result(Request $request)
    {
        $kode = $request->input('kode');

        $perabotan = Perabotan::where('kode', $kode)->first();

        if (!$perabotan) {
            return response()->json(['status' => 'error', 'message' => 'Perabotan tidak ditemukan']);
        }

        $url = route('perabotan.detail', ['kode' => $perabotan->kode]);

        return response()->json([
            'status' => 'success',
            'url' => $url
        ]);
    }

}
