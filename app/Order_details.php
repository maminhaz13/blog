<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_details extends Model
{
    protected $fillable = ['stars', 'review'];
    //protected $guarded = [''];

    use SoftDeletes;

    function product(){
        return $this->belongsTo('App\Product');
    }

    function user(){
        return $this->belongsTo('App\User');
    }

}
