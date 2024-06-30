<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioAnggota extends Model
{
    use HasFactory;

    protected $table = 'portofolio_anggotas';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function portofolioGambar()
    {
        return $this->hasMany(PortofolioGambar::class, 'portofolio_id');
    }

    public function kategoriPortofolio()
    {
        return $this->belongsToMany(KategoriPortofolio::class, 'portofolio_kategoris', 'portofolio_id', 'kategori_id')->withTimestamps();
    }

    // public function portoByKategori()
    // {
    //     return $this->belongsTo(KategoriPortofolio::class, 'id');
    // }
}
