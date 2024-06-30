<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipText extends Model
{
    use HasFactory;

    protected $table = 'arsip_text';
    protected $fillable = ['arsip_id','text','halaman'];

    public function arsip(){
        return $this->belongsTo(Arsip::class, 'arsip_id');
    }
}
