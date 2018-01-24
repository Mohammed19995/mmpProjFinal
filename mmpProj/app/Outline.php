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

    public function getOutlineBook($id) {
        return $this::where('book_id' , $id)->get();
    }

    public function removeOutlineBook($id) {

        $this::where('book_id' ,$id)->delete();
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("outline", "LIKE","%$keyword%");

            });
        }
        return $query;
    }
}
