<?php

namespace App\Model;

use App\Model\SubCategory;
use Auth;
use App\User;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{


    protected $fillable =
     ['category_id', 'subcategory_id','product_name','slug', 'description', 'price', 'in_stock', 'image','pdf'];


     public function parentCategory()
     {
     	 return $this->belongsTo(Category::class, 'category_id');
     }
    public function parentSubCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

}

