<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lokasi',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function lokasiInduk()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    // Relasi: satu lokasi memiliki banyak perabotan
    public function perabotans()
    {
        return $this->hasMany(Perabotan::class);
    }

    // Relasi: satu lokasi bisa digunakan di banyak mutasi perabotan
    public function mutasiDari()
    {
        return $this->hasMany(MutasiPerabotan::class, 'lokasi_awal');
    }

    public function mutasiKe()
    {
        return $this->hasMany(MutasiPerabotan::class, 'lokasi_tujuan');
    }




}
