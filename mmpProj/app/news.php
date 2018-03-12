<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = 'news';
    protected $fillable = ['titel', 'discretion', 'path', ];



    public function addNews($titel, $discretion, $path)
    {
        return $this::create([
            'titel' => $titel,
            'discretion' => $discretion,
            'path' => $path,

        ]);
    }


    public function updateNewsWithImg($id ,$titel , $discretion , $image )
    {

        $getMosque = $this::findOrFail($id);
        $getMosque->update([
            'titel' => $titel,
            'discretion' => $discretion,
            'path' => $image,
        ]);
    }

    public function updateNewsWithoutImg($id ,$titel , $discretion  )
    {

        $getMosque = $this::findOrFail($id);
        $getMosque->update([
            'titel' => $titel,
            'discretion' => $discretion,
        ]);
    }

    public function deleteNews($id)
    {
        $this::find($id)->delete();
    }

}
