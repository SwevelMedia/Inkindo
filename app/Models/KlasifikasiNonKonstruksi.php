<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiNonKonstruksi extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_non_konstruksis';

    protected $fillable = [
         'nama_klasifikasi_konstruksi', 'logo_light','logo_dark',
    ];

    public function layanan_non_konstruksi()
    {
        return $this->hasMany(LayananNonKonstruksi::class);
    }
}
