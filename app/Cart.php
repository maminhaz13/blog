<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    protected $fillable = ['product_quantity'];
    // protected $guarded = [''];

    use SoftDeletes;

    function relationship_with_cart(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

}
