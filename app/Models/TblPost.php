<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPost extends Model
{
    use HasFactory;

    protected $table = 'tbl_post';

    protected $fillable = [
        'cat',
        'title',
        'body',
        'image',
        'author',
        'tags',
        'date',
    ];
}
