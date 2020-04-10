<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class news extends Model
{
    use SoftDeletes;
    protected  $data=['deleted_at'];
    protected $fillable=['title','abstract','description','image'];
}
