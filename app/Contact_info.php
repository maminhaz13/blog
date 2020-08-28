<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact_info extends Model
{
    protected $fillable = ['email', 'telephone', 'phone', 'address', 'show_status'];
    //protected $guarded = [''];

    use SoftDeletes;

}
