<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipKategori extends Model
{
    use HasFactory;

    protected $table = 'arsip_kategoris';

    protected $fillable = ['nama_kategori'];

    public function arsip()
    {
        return $this->hasMany(Arsip::class, 'arsip_kategori_id');
    }
}
