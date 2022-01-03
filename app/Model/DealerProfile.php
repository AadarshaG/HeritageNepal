<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DealerProfile extends Model 
{
    protected $fillable =['user_id', 'company_name', 'company_address', 'phone_number','landline_number'];
}
