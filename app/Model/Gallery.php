<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['service_id','title','slug','image','enabled','client_title','location','service_provided'];

    public function service()
    {
        return $this->belongsTo('App\Model\Service','service_id','id');
    }
}
