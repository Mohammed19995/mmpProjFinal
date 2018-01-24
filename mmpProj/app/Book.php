<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name', 'cat_id', 'edition', 'summary', 'img', 'publish'];
    protected $dates = ['publish'];

    public function addBook($name, $cat_id, $edition, $summary, $img, $publish)
    {
        return $this::create([
            'name' => $name,
            'cat_id' => $cat_id,
            'edition' => $edition,
            'summary' => $summary,
            'img' => $img,
            'publish' => $publish,
        ]);
    }

    public function getAllBook()
    {
        return $this::all();
    }

    public function getBookData($id)
    {
        return $this::find($id);
    }

    public function getPaginateBook()
    {
        return $this::paginate(8);
    }

    public function getPaginateBookByCat($catId)
    {
        return $this::where('cat_id', $catId)->paginate(8);
    }

    public function getAllBookForYear($year)
    {
        return $this::whereYear('publish', '=', $year)->get();
    }

    public function updateBookWithImg($id, $name, $cat_id, $edition, $summary, $img, $publish)
    {

        $getBook = $this::findOrFail($id);
        $getBook->update([
            'name' => $name,
            'cat_id' => $cat_id,
            'edition' => $edition,
            'summary' => $summary,
            'img' => $img,
            'publish' => $publish,
        ]);
    }

    public function updateBookWithoutImg($id, $name, $cat_id, $edition, $summary, $publish)
    {

        $getBook = $this::findOrFail($id);
        $getBook->update([
            'name' => $name,
            'cat_id' => $cat_id,
            'edition' => $edition,
            'summary' => $summary,
            'publish' => $publish,
        ]);
    }


    public function deleteBook($id)
    {
        $this::find($id)->delete();
    }

    public function getBookByCat($id, $cat_id)
    {
        return $this::where('cat_id', $cat_id)
            ->where('id', '<>', $id)
            ->get();
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%");

            });
        }
        return $query;
    }

}
