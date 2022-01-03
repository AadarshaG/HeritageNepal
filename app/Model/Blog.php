<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','slug','image','author','description','meta_title',
        'meta_keyword','meta_description'];
}
