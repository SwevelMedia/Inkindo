<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use \Conner\Tagging\Taggable;
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'slug',
        'penulis',
        'poster',
        'isi',
        'berita_kategori_id',
    ];

    public function beritaKategori()
    {
        return $this->belongsTo(BeritaKategori::class);
    }
}
