<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaKategori extends Model
{
    use HasFactory;

    protected $table = 'berita_kategoris';

    protected $fillable = [
        'berita_kategori',
        'slug',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getBeritaKategoriAttribute($value)
    {
        return ucwords($value);
    }
}
