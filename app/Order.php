<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //protected $fillable = [''];
    //protected $guarded = [''];

    use SoftDeletes;

}
