<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    protected $guarded= [];

    use SoftDeletes;

    function relationship_with_category_for_catname(){
        return $this->hasOne('App\Category', 'id', 'category_id')->withTrashed();
    }

    function onetomanyrelationship_with_product_multiple_table(){
        return $this->hasMany('App\Picture_Multiple', 'product_id', 'id')->withTrashed();
    }
}
