<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = "keywords";
    protected $fillable = ['book_id' , 'word'];

    public function addKeyword($book_id , $word) {
        $this::create([
            'book_id' => $book_id ,
            'word' => $word
        ]);
    }
}
