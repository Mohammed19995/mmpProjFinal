<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class newsCon extends Controller
{
    protected $obj;
    public function __construct()
    {

        $this->obj = new news();
    }
    public function adminNews(){
        return view('admin.news.addNews');
    }

    public function addNews(Request $request){


        $titel = $request->titel;
        $discretion = $request->discretion;
        $img = $request->file;



        $validator = Validator::make($request->all(), [
            'titel' => 'required',
               'discretion' =>'required',
               'file'=>'required',


        ]);

        if ( $request->checkImg == 0) {

            $validator->after(function ($validator) {
                $validator->errors()->add('uploadImgError', 'The Img field must required');
            });
        }
        $attributeNames = array();
        $validator->setAttributeNames($attributeNames);


        if ($validator->passes()) {
            $pathImg= $img->store('public/News/img');
            $this->obj->addNews($titel , $discretion , $pathImg);
            return response()->json(['success' => 1]);
        }
            return response()->json(['error' => $validator->errors()->all()]);

    }
    public function viewNews(){


       $allnews =  news::all();
        return view('admin.news.viewNews' , ['allnews'=>$allnews]);
    }

    public function editNews(Request $request){

        $validator = Validator::make($request->all(), [
            'titelNews' => 'required',
            'discretion' => 'required',


        ]);
        $attributeNames = array(

        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->passes()) {

            $id = $request->id_hidden;
            $titel = $request->titelNews;
            $discretion = $request->discretion;
            $image = $request->file;
            $checkImg = $request->checkImg;

            $path = 0;
            if ($checkImg == 1) {
                $pathImgBook = $image->store('public/News/img');
                $this->obj->updateNewsWithImg($id, $titel, $discretion, $pathImgBook);
                $path = $pathImgBook;

            } else {
                $this->obj->updateNewsWithoutImg($id, $titel, $discretion);

            }
            return response()->json(['success' => 1, 'path' => $path]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    public function deleteNews(Request $request){
        $id = $request->idNews;

        $this->obj->deleteNews($id);
    }

public  function newsDetail($id){
        $newsDetail  =  news::where('id',$id)->first();
        return view('mmpApp.newsDetail' , ['news'=>$newsDetail]);
}
}
