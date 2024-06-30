<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananNonKonstruksi extends Model
{
    use HasFactory;

    protected $table = 'layanan_non_konstruksis';

    protected $fillable = [
        'jenis_layanan_non_konstruksi',
        'deskripsi_layanan_non_konstruksi',
        'klasifikasi_non_konstruksi_id',
    ];

    public function klasifikasi_non_konstruksi()
    {
        return $this->belongsTo(KlasifikasiNonKonstruksi::class);
    }
}
