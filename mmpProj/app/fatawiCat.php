<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fatawiCat extends Model
{
    protected $table = "fatawi_cats";
    protected $fillable = ['name'];


    public function addCategory($name) {
        $this::create([
            'name' => $name
        ]);

    }
    public function getAllCategory() {
        $allCat =  $this->all();
        return $allCat;
    }
    public function deleteCategory($id){
        return $this::find($id)->delete();
    }

    public function editCat($id , $name) {
        $cat = $this::findOrFail($id);
        return  $cat->update([
            'name' =>$name
        ]);

    }
}
