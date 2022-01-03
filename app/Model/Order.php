<?php

namespace App\Model;

use App\User;
use App\Model\Product;
use App\Model\ShippingDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total', 'delivered','payment_type'];


    public function OrderItems()
    {
    	return $this->belongsToMany(Product::class)->withPivot('qty', 'total', 'color', 'size');
    }

    public function orderedBy()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function addressDetails()
    {
    	return $this->hasOne(ShippingDetails::class, 'user_id');
    }

    public function productName()
    {
        return $this->hasOne(Product::class)->withPivot('product_id');
    }
   
}


