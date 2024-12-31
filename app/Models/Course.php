<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'course_id'); // Assuming tbl_post has a course_id column
    // }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
