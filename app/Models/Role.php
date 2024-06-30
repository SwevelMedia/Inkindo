<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public const SUPPER_ADMIN = "admin";
    public const GUEST = "anggota";

    public $table = 'roles';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'title',
        'guard_name',
        'description'
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
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255|unique:roles,name'
    ];

    protected $appends = array('permission_data', 'check_supper_admin');
    public function getPermissionDataAttribute()
    {
        return $this->permissions->pluck('id', 'id');
    }

    public function getCheckSupperAdminAttribute()
    {
        return $this->name == Role::SUPPER_ADMIN;
    }
}
