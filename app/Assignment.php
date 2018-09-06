<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Course;

class Assignment extends Model
{
    protected $fillable = [
        'name', 'type', 'course_id', 'user_id', 'due', 'details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
