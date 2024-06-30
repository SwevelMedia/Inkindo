<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoinSyaratAnggota extends Model
{
    use HasFactory;
    protected $table = 'poin_syarat_anggota';
    protected $fillable = [
        'poin',
        'judul_syarat_anggota_id',
    ];

    public function judulSyaratAnggota()
    {
        return $this->belongsTo(JudulSyaratAnggota::class);
    }

}