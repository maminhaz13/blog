<?php

namespace App;

use App\Order_details;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //protected $fillable = [''];
    //protected $guarded = [''];

    use SoftDeletes;

    function order_details(){
        return $this->hasMany('App\Order_details');
    }

}
