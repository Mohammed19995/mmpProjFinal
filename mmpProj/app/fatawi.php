<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fatawi extends Model
{
    protected $table = "fatawis";
    protected $fillable = ['question','answer','mufti','user_id','cat_id','private'];

    public function addFatwa(  $question ,$user_id ,$cat_id ,$private){
        $this::create([
            'question'=>$question,
            'answer'=>$answer="",
            'mufti'=>$mufti="",
            'user_id'=>$user_id,
            'cat_id'=>$cat_id,
            'private'=>$private

        ]);
    }
    public function addAdminFatwa(  $question ,$answer,$mufti,$user_id ,$cat_id ){
        $this::create([
            'question'=>$question,
            'answer'=>$answer,
            'mufti'=>$mufti,
            'user_id'=>$user_id,
            'cat_id'=>$cat_id,
            'private'=>$private=0

        ]);
    }
    public function getNotAnswer(){
    $all=  $this->where('answer',"")->get();
    return $all;
    }
    public function getAllAdvisory(){
        $all=   $this->where('answer','<>',"")->get();
        return $all;
    }

    public function editAnswer($id,$answer,$mufti,$cat_id){
        $updateAnswer = $this::findOrFail($id);
        return  $updateAnswer->update([
            'answer' =>$answer,
             'mufti'=>$mufti,
            'cat_id'=>$cat_id,
        ]);
    }
    public function editAdvisory($id,$question,$answer,$mufti,$cat_id){
        $updateAnswer = $this::findOrFail($id);
        return  $updateAnswer->update([
            'question'=>$question,
            'answer' =>$answer,
            'mufti'=>$mufti,
            'cat_id'=>$cat_id,
        ]);
    }
    public function delAdvisory($id){
        return $this::find($id)->delete();

    }

}
