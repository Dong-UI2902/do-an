<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    const PATH_IMAGE = 'upload/blog/';

    protected $guarded = ['id'];
}
