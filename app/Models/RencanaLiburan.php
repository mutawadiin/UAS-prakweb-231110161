<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RencanaLiburan extends Model
{
    protected $fillable = [
        'nama_rencana',
        'destinasi',
        'tgl_berangkat',
        'tgl_pulang',
        'estimasi_biaya',
        'catatan',
        'status',
    ];

    public function perjalanans()
    {
        return $this->hasMany(Perjalanan::class, 'rencana_id');
    }
}
