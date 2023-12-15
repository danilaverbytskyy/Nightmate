<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

}
