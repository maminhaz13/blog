<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    //protected $fillable = [''];
    protected $guarded = [''];

    use SoftDeletes;

}
