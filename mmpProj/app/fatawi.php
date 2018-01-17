<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fatawi extends Model
{
    protected $table = "fatawis";
    protected $fillable = ['question','answer','user_id','cat_id','private'];

    public function addFatwa(  $question ,$user_id ,$cat_id ,$private){
        $this::create([
            'question'=>$question,
            'answer'=>$answer="",
            'user_id'=>$user_id,
            'cat_id'=>$cat_id,
            'private'=>$private

        ]);
    }

}
