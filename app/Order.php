<?php

namespace App;

use App\User;
use App\Order_details;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    protected $fillable = ['payment_status'];
    //protected $guarded = [''];

    use SoftDeletes;

    function order_details(){
        return $this->hasMany('App\Order_details');
    }

    function user(){
        return $this->belongsTo('App\User');
    }

}
