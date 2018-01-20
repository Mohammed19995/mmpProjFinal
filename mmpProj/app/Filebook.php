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

    public function getAllType($id) {
        return $this::where('book_id' , $id)->get();
    }

    public function updateFileBook($id , $type_id ,$lang_id ) {
        $this::find($id)->update([
            'type_id' => $type_id ,
            'lang_id' => $lang_id
        ]);
    }

    public function deleteFileBook($id) {
        $this::find($id)->delete();
    }
    public function getDataFileBook($id) {
        return $this::find($id);
    }
    public function getDataFileForBook($booId) {
        return $this::where('book_id' , $booId)->get();
    }
}
