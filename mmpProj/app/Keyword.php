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

    public function getKeywordBook($id) {
        return $this::where('book_id' , $id)->get();
    }

    public function removeKeywordBook($id) {

        $this::where('book_id' ,$id)->delete();
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("word", "LIKE","%$keyword%");

            });
        }
        return $query;
    }
}
