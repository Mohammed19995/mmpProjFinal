<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filebook extends Model
{
    protected $table = 'filebooks';
    protected $fillable = ['book_id', 'type_id', 'lang_id', 'path'];

    public function addFileBook($book_id, $type_id, $lang_id, $path)
    {
        $this::create([
            'book_id' => $book_id,
            'type_id' => $type_id,
            'lang_id' => $lang_id,
            'path' => $path,
        ]);
    }
}
