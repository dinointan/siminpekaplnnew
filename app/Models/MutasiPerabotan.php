<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MutasiPerabotan extends Model
{
    protected $table = 'mutasi_perabotans'; // pastikan ini sesuai dengan tabel di database
    use HasFactory;
    protected $fillable = [
        'id_perabotan',
        'tanggal_mutasi',
        'keterangan',
        'lokasi_awal',
        'lokasi_tujuan',
    ];

    /**
     * Relasi ke tabel Perabotan
     * Mutasi ini milik satu perabotan
     */

    /**
     * Relasi ke tabel Lokasi
     * Mutasi ini menunjukkan ke lokasi tujuan
     */

    // App\Models\MutasiPerabotan.php

    public function lokasiAwal()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_awal');
    }

    public function lokasiTujuan()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_tujuan');
    }
    public function perabotan()
    {
        return $this->belongsTo(Perabotan::class, 'id_perabotan');
    }

    /**
     * Relasi ke tabel Lokasi
     * Mutasi ini menunjukkan dari lokasi awal
     */

}
