<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use SoftDeletes;
    protected $data = ['deleted_at'];
    //protected $fillable = ['about', 'color', 'font'];
}
