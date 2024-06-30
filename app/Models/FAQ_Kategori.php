<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ_Kategori extends Model
{
    use HasFactory;

    protected $table = 'faq_kategoris';

    protected $fillable = ['faq_kategori'];

    public function faq()
    {
        return $this->hasMany(FAQ::class, 'faq_kategori_id');
    }
}
