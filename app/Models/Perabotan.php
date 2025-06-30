<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perabotan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'kategori_id',
        'tahun_pengadaan',
        'lokasi_id',
        'keterangan',
        'foto'
    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'id'); // lokasi_id adalah foreign key di tabel perabotans
    }


    public function mutasi_perabotan()
    {
        return $this->hasMany(MutasiPerabotan::class, 'id_perabotan', 'id_perabotan');
    }


}
