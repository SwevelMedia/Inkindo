<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGallery extends Model
{
    use HasFactory;
    protected $table = 'kategori_galleries';
    protected $fillable = [
       'nama_kategori',
    ];
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
