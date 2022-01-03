<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShippingDetails extends Model
{
    protected $fillable = ['user_id','zone', 'district', 'city', 'street', 'phone_number'];


}
