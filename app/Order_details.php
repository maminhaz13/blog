<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_details extends Model
{
    //protected $fillable = [''];
    //protected $guarded = [''];

    use SoftDeletes;

    function product(){
        return $this->belongsTo('App\Product');
    }

}
