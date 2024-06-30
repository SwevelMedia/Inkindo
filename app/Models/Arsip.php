<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsips';

    protected $fillable = ['nama_arsip', 'keterangan', 'file_arsip', 'arsip_kategori_id'];

    public function arsip_kategori()
    {
        return $this->belongsTo(ArsipKategori::class, 'arsip_kategori_id');
    }

    public function arsip_text(){
        return $this->belongsTo(ArsipText::class, 'arsip_id');
    }
}
