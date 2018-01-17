<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outline extends Model
{
    protected $table = "outlines";
    protected $fillable = ['book_id' , 'outline'];

    public function addOutline($book_id , $outline) {
        $this::create([
            'book_id' => $book_id ,
            'outline' => $outline
        ]);
    }
}
