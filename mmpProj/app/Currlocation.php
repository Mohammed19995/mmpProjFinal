<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currlocation extends Model
{
    protected $table = 'currlocations';
    protected $fillable =['lat' , 'lng'];

    public function addCurrLocation($lat , $lng) {
        $getAll = $this::all();
        if(count($getAll) == 0) {
            $this::create([
                'lat' => $lat ,
                'lng' => $lng
            ]);
        }else {
            $firstLatLng = $this::find($getAll[0]->id);
            $firstLatLng->update([
                'lat' =>$lat ,
                'lng' => $lng
            ]);
        }

    }
}
