<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    protected $fillable = ['story', 'email', 'telephone', 'phone', 'address', 'show_status'];
    //protected $guarded = [''];

    use SoftDeletes;

}
