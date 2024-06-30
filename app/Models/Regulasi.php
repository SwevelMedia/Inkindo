<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulasi extends Model
{
    use HasFactory;

   
      protected $fillable = ['nama_regulasi','regulasi','kategori_id'];

    public function regulasi_kategoris()
    {
        return $this->belongsTo(RegulasiKategori::class);
    }
}
