<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{

    protected $table = "categories";
    protected $fillable = ['name'];


    public function index() {
        return view('admin.library.category');

    }
    public function addCategory($name) {
        $this::create([
            'name' => $name
        ]);

    }
    public function getAllCategory() {
        $allCat =  $this->all();
        return $allCat;
    }

    public function getCategory($id) {
        return $this::where('id' ,$id)->get();
    }
    public function editCat($id , $name) {
        $cat = $this::findOrFail($id);
      return  $cat->update([
            'name' =>$name
        ]);

    }

    public function delCat($id) {
       return $this::find($id)->delete();
    }

    public static function getNameCatForBookId($booId) {
        return category::find($booId);
    }
    public static function countBookForCat($catId) {
        return count(Book::where('cat_id' , $catId)->get());
    }
}
