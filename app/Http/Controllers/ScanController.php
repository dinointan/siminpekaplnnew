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
        $perabot = Perabotan::where('kode', $kode)->first();

        if (!$perabot) {
            return response()->json(['status' => 'not_found']);
        }

        return response()->json([
            'status' => 'success',
            'data' => $perabot
        ]);
    }

}
