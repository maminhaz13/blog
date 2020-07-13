<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['category_name','category_description', 'category_picture',];

    function onetomanyrelationship_with_product_table(){
        return $this->hasMany('App\Product', 'category_id', 'id')->withTrashed();
    }


}
