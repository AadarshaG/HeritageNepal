<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['title','image','pdf','description','meta_title',
        'meta_keyword','meta_description'];
}
