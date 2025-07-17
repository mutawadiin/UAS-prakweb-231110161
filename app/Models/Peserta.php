<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'email',
        'identitas',
    ];

    public function perjalanans()
    {
        return $this->belongsToMany(Perjalanan::class, 'perjalanan_peserta', 'peserta_id', 'perjalanan_id');
    }
}
