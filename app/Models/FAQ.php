<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = ['pertanyaan', 'jawaban', 'faq_kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(FAQ_Kategori::class, 'faq_kategori_id');
    }
}
