<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Blog extends Model
{
    protected $guarded = [''];

    use SoftDeletes;

    function relationship_with_user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
