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
    $content = $request->input('kode'); // 'kode' di JS kamu

    if (!Str::contains($content, '/perabotan/detail/')) {
        return response()->json([
            'status' => 'error',
            'message' => 'Format QR tidak dikenali'
        ]);
    }

    $id = (int) Str::afterLast($content, '/'); // Ambil ID

    if (!is_numeric($id) || $id <= 0) {
        return response()->json([
            'status' => 'error',
            'message' => 'ID tidak valid'
        ]);
    }

    $perabotan = Perabotan::with('lokasi')->find($id);

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
