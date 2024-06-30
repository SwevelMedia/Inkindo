<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'gambar',
        'judul',
        'deskripsi',
        'tanggal',
        'kategeori'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}