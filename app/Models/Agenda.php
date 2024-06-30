<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $fillable = [
        'poster',
        'kegiatan',
        'deskripsi',
        'tanggal',
        'waktu',
        'tempat',
        'penyelenggara',
        'link',
    ];

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
