<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title','slug','image','pdf','enabled','description','meta_title',
        'meta_keyword','meta_description'];
}
