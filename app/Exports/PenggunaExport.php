<?php

namespace App\Exports;

use App\Models\Pengguna;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenggunaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::all()->map(function ($item) {
            return [
                'ID User Pengguna' => $item->id,
                'Nama User Pengguna' => $item->name,
                'Username' => $item->username,
                'Role' => $item->role ?? '-',
                'Divisi' => $item->divisi,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID User Pengguna',
            'Nama User Pengguna',
            'Username',
            'Role',
            'Divisi',
        ];
    }
}
