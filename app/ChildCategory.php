<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildCategory extends Model
{
    protected $fillable = ['category_id', 'child_category_name', 'child_category_desc', 'child_category_pic'];
    //protected $guarded = [''];

    public function category_data(){
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

    use SoftDeletes;

}
