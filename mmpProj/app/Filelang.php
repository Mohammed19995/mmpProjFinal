<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filelang extends Model
{
    protected $table = 'filelangs';
    protected $fillable = ['name'];

    public function getAllLang() {
        return $this::all();
    }
}
