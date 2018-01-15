<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name' ,'cat_id' , 'edition' , 'summary' ,'img' , 'publish'];

}
