<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    protected $fillable = ['main_banner_picture', 'main_banner_title', 'main_banner_short_description', 'show_status'];
    //protected $guarded = [''];

    use SoftDeletes;

}
