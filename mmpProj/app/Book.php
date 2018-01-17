<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['name', 'cat_id', 'edition', 'summary', 'img', 'publish'];

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
}
