<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testmonial extends Model
{
    protected $fillable = ['show_status'];

    use SoftDeletes;

    function testmonial_user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
