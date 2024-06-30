<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudulSyaratAnggota extends Model
{
    use HasFactory;
    protected $table = 'judul_syarat_anggota';
    protected $fillable = [
        'kategori',
        'nama_judul',
    ];

    // public function poin()
    // {
    //     return $this->hasMany(PoinSyaratAnggota::class, 'judul_syarat_anggota_id');
    // }
    public function poinSyaratAnggota()
    {
        return $this->hasMany(PoinSyaratAnggota::class, 'judul_syarat_anggota_id');
    }

}