<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";
    protected $fillable = ['book_id' , 'author'];

    public function addAuthor($book_id , $author) {
        $this::create([
            'book_id' => $book_id ,
            'author' => $author
        ]);
    }
}
