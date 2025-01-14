<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'author',
        'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime'
    ];
}
