<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Assignment;

class Course extends Model
{
    protected $fillable = [
        'name', 'instructor', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
