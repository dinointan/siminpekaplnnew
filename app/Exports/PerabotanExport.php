<?php

namespace App\Exports;

use App\Models\Perabotan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PerabotanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Perabotan::with(['kategori', 'lokasi'])->get()->map(function ($item) {
            return [
                'ID' => $item->id,
                'Kode' => $item->kode,
                'Nama' => $item->nama,
                'Kategori' => $item->kategori->nama_kategori ?? '-',
                'Tahun Pengadaan' => $item->tahun_pengadaan,
                'Lokasi' => $item->lokasi->nama_lokasi ?? '-',
                'Keterangan' => $item->keterangan ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode',
            'Nama',
            'Kategori',
            'Tahun Pengadaan',
            'Lokasi',
            'Keterangan',
        ];
    }
}
