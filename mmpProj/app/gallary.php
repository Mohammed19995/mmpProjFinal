<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gallary extends Model
{
    protected $table = "gallaries";
    protected $fillable = ['path','created_at','updated_at'];
}
