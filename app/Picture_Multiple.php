<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture_Multiple extends Model
{
    protected $guarded = [];

    use SoftDeletes;

}
