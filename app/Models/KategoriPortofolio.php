<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPortofolio extends Model
{
    use HasFactory;

    protected $table = 'daftar_kategori_portofolios';
    protected $fillable = ['kategori', 'anggota_id'];

    public function portofolio()
    {
        //    return $this->belongsToMany(Klasifikasi::class, 'klasifikasi_anggotas')->withTimestamps();
        return $this->belongsToMany(PortofolioAnggota::class, 'portofolio_kategoris', 'portofolio_id', 'kategori_id')->withTimestamps();
    }

    // public function portoByKategori()
    // {
    //     return $this->hasMany(PortofolioAnggota::class, 'kategori_id');
    // }
}
