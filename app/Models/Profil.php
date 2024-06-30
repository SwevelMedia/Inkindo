<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = "profils";

    protected $fillable = [
        'prakata',
        'deskripsi_home',
        'gambar_prakata',
        'visi',
        'misi',
        'kode_etik',
        'email',
        'no_hp',
        'alamat',
        'facebook',
        'instagram',
        'twitter',
        'whatsapp',
    ];
}
