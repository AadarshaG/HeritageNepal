<?php

namespace App\Model;

use App\User;
use App\Model\product;
use App\Model\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','slug', 'created_by'];


    public function subcateogry()
    {
    	return $this->hasmany(SubCategory::class);
    }

    public function product()
    {
    	return $this->hasmany(product::class);
    }


    public function createdBy()
    {
    	return $this->belongsTo(user::class, 'created_by');
    }
}
