<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filetype extends Model
{
    protected $table = 'filetypes';
    protected $fillable = ['name'];

    public function getAllType() {
        return $this::all();
    }
}
