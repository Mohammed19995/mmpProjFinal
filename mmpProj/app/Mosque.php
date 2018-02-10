<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    public $table = 'mosques';
    public $fillable = ['name' , 'country' , 'city' , 'street' , 'imam_name' , 'email'
        , 'phone' , 'friday_prayer' , 'woman_chapel' , 'image' ,'lat' ,'lng'];

    public function addMosque($name ,$country,$city ,$street , $imam_name ,$email ,$phone , $friday_prayer ,$woman_chapel , $image , $lat , $lng  ) {
        $this::create([
            'name' =>$name ,
            'country' =>$country ,
            'city' => $city ,
            'street' => $street,
            'imam_name' =>$imam_name ,
            'email' => $email,
            'phone' => $phone,
            'friday_prayer' => $friday_prayer ,
            'woman_chapel' =>$woman_chapel,
            'image' => $image,
            'lat' =>$lat ,
            'lng' =>$lng
        ]);
    }

    public function updateMosqueWithImg($id ,$name , $imam_name ,$email ,$phone , $friday_prayer ,$woman_chapel , $image )
    {

        $getMosque = $this::findOrFail($id);
        $getMosque->update([
            'name' => $name,
            'imam_name' => $imam_name,
            'email' => $email,
            'phone' => $phone,
            'friday_prayer' => $friday_prayer ,
            'woman_chapel' =>$woman_chapel,
            'image' => $image,
        ]);
    }

    public function updateMosqueWithoutImg($id,$name , $imam_name ,$email ,$phone , $friday_prayer ,$woman_chapel )
    {

        $getMosque = $this::findOrFail($id);
        $getMosque->update([
            'name' => $name,
            'imam_name' => $imam_name,
            'email' => $email,
            'phone' => $phone,
            'friday_prayer' => $friday_prayer ,
            'woman_chapel' =>$woman_chapel,

        ]);
    }

    public function deleteMosque($id)
{
    $this::find($id)->delete();
}

    public function getAllBook() {
        return $this::all();
    }
    public function updateLocation($id ,$country,$city ,$street, $lat , $lng )
    {

        $getMosque = $this::findOrFail($id);
        $getMosque->update([

            'country' =>$country ,
            'city' => $city ,
            'street' => $street,
            'lat' =>$lat ,
            'lng' =>$lng

        ]);
    }
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE", "%$keyword%")->orwhere("imam_name", "LIKE", "%$keyword%")->orwhere("country", "LIKE", "%$keyword%")->orwhere("street", "LIKE", "%$keyword%")->orwhere("city", "LIKE", "%$keyword%");

            });
        }
        return $query;
    }
}


