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

    public function getAllBook() {
        return $this::all();
    }

}


