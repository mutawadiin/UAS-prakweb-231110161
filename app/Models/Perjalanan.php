<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $fillable = [
        'rencana_id',
        'peserta_id',
        'kegiatan',
        'catatan',
        'status',
    ];

    public function rencana()
    {
        return $this->belongsTo(RencanaLiburan::class, 'rencana_id');
    }

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class, 'perjalanan_peserta', 'perjalanan_id', 'peserta_id');
    }
}
