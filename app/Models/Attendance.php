<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'ip',
        'present',
        'day',
        'time_in',
        'time_out'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ip' => 'string',
        'user_id' => 'integer',
        'present' => 'integer',
        'day' => 'date'
    ];

    protected $appends = array('user_name', 'day_text');
    public function getUserNameAttribute()
    {
        return $this->user->name;
    }
    public function getDayTextAttribute()
    {
        return $this->day->format('Y-m-d');
    }
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
