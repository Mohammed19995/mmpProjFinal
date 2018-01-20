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

    public function getAuthorBook($id) {
      return $this::where('book_id' , $id)->get();
    }

    public function removeAuhtorBook($id) {

        $this::where('book_id' ,$id)->delete();
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("author", "LIKE","%$keyword%");

            });
        }
        return $query;
    }

}
