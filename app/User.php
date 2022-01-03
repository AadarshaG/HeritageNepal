<?php

namespace App;

use App\Model\Order;
use App\Model\ShippingDetails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id','is_approved',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function is_approved()
    {
        $value = $this->is_approved;
         if ($value == 1) {
             return true;
         }else {
             return false;
         }

    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

      public function verifyUser()
    {
        return $this->hasOne('App\Model\VerifyUser');
    }

}
