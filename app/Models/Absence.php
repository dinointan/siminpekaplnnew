<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Absence extends Model
{
    protected $fillable = [
        // sesuaikan dengan kolom yang ada di tabel
        'user_id',
        'date',
        'type',
    ];
}
