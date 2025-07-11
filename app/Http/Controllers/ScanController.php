<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perabotan; // Sesuaikan dengan model perabot kamu
use Illuminate\Support\Str;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan.index'); // Tampilan halaman scan
    }

    public function result(Request $request)
{
    $content = $request->input('kode');

    // Ambil ID dari URL hasil QR Code
    if (Str::contains($content, '/perabotan/detail/')) {
        $id = Str::afterLast($content, '/');
        $perabotan = \App\Models\Perabotan::find($id);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Format QR tidak dikenali'
        ]);
    }

    if (!$perabotan) {
        return response()->json([
            'status' => 'error',
            'message' => 'Perabotan tidak ditemukan'
        ]);
    }

    return response()->json([
        'status' => 'success',
        'url' => route('perabotan.public.detail', ['id' => $perabotan->id]),
        'data' => [
            'nama' => $perabotan->nama,
            'lokasi' => optional($perabotan->lokasi)->nama_lokasi,
        ]
    ]);
}

}
