<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'tbl_post'; // Specify the table name

    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'cat', 'title', 'body', 'image', 'author', 'tags', 'date',
    ];
}

