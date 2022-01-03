<?php

namespace App\Model;

use App\User;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['category_id', 'subcategory_name', 'slug','created_by'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function createdBy()
    {
    	return $this->belongsTo(user::class, 'created_by');
    }

    public function parentCategory()
     {
     	 return $this->belongsTo(Category::class, 'category_id');
     }
}
