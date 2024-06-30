<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananKonstruksi extends Model
{
    use HasFactory;

    protected $table = 'layanan_konstruksis';

    protected $fillable = [
        'jenis_layanan_konstruksi',
        'deskripsi_layanan_konstruksi',
        'klasifikasi_konstruksi_id',
    ];

    public function klasifikasi_konstruksi()
    {
        return $this->belongsTo(KlasifikasiKonstruksi::class, 'klasifikasi_konstruksi_id');
    }
}