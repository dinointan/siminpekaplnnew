<?php

namespace App\Http\Controllers;

use App\Models\MutasiPerabotan;
use App\Models\Lokasi;
use App\Models\Perabotan;
use Illuminate\Http\Request;

class MutasiPerabotanController extends Controller
{
    public function index()
    {
        $mutasi_perabotans = MutasiPerabotan::with(['perabotan', 'lokasiAwal', 'lokasiTujuan'])->latest()->get();

        return view('inventory.mutasi.index', [
            'mutasi_perabotans' => $mutasi_perabotans,
            'type' => 'show',
        ]);
    }


    public function create()
    {
        $lokasis = Lokasi::all();
        $perabotans = Perabotan::all();
        $type = 'create';

        return view('inventory.mutasi.form', compact('lokasis', 'perabotans', 'type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_perabotan' => 'required|exists:perabotans,id',
            'tanggal_mutasi' => 'required|date',
            'lokasi_awal' => 'required|exists:lokasis,id',
            'lokasi_tujuan' => 'required|exists:lokasis,id',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data mutasi
        MutasiPerabotan::create([
            'id_perabotan' => $request->id_perabotan,
            'tanggal_mutasi' => $request->tanggal_mutasi,
            'lokasi_awal' => $request->lokasi_awal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'keterangan' => $request->keterangan,
        ]);
        // Update lokasi perabotan sesuai lokasi tujuan
        $perabotan = Perabotan::find($request->id_perabotan);
        $perabotan->lokasi_id = $request->lokasi_tujuan;
        $perabotan->save();

        return redirect()->route('mutasi.index')->with('success', 'Mutasi berhasil disimpan dan lokasi diperbarui.');
    }

    public function show(MutasiPerabotan $mutasi)
    {
        return view('inventory.mutasi.show', compact('mutasi'));
    }

    public function edit(MutasiPerabotan $mutasi)
    {
        $lokasis = Lokasi::all();
        $perabotans = Perabotan::all();
        $type = 'edit';

        return view('inventory.mutasi.form', [
            'mutasi' => $mutasi,
            'lokasis' => $lokasis,
            'perabotans' => $perabotans,
            'type' => $type,
        ]);
    }


    public function update(Request $request, MutasiPerabotan $mutasi)
    {
        $request->validate([
            'id_perabotan' => 'required|exists:perabotans,id',
            'tanggal_mutasi' => 'required|date',
            'lokasi_awal' => 'required|exists:lokasis,id',
            'lokasi_tujuan' => 'required|exists:lokasis,id',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $mutasi->update($request->all());

        return redirect()->route('mutasi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MutasiPerabotan $mutasi)
    {
        $mutasi->delete();

        return redirect()->route('mutasi.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function export(Request $request)
    {
        $type = $request->get('type');

        if ($type === 'excel') {
            // proses export Excel
        } elseif ($type === 'pdf') {
            // proses export PDF
        } else {
            return redirect()->back()->with('status', 'Tipe export tidak dikenali');
        }
    }
}
