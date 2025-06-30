<?php

namespace App\Exports;

use App\Models\MutasiPerabotan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MutasiPerabotanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return MutasiPerabotan::with(['perabotan', 'lokasiAwal', 'lokasiTujuan'])->get()->map(function ($item) {
            return [
                'ID' => $item->id,
                'Perabotan' => $item->perabotan->nama ?? '-',
                'Lokasi Asal' => $item->lokasiAwal->nama_lokasi ?? '-',
                'Lokasi Tujuan' => $item->lokasiTujuan->nama_lokasi ?? '-',
                'Tanggal Mutasi' => $item->tanggal_mutasi,
                'Keterangan' => $item->keterangan ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Perabotan',
            'Lokasi Asal',
            'Lokasi Tujuan',
            'Tanggal Mutasi',
            'Keterangan',
        ];
    }
}
