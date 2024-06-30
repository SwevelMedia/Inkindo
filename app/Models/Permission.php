<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public $table = 'permissions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'title',
        'guard_name',
        'description',
        'module'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'title' => 'string',
        'guard_name' => 'string',
        'module' => 'string'
    ];
}
