<?php

namespace App\Http\Controllers;

use App\gallary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class gallaryCon extends Controller
{
    public function index()
    {
        $allPhoto = gallary::all();
        return view('admin/gallary/addGallary', ["allpath" => $allPhoto]);
    }

    public function addPhoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gallery' => 'required',
        ]);
//
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {

            $files = $request->file('gallery');

            foreach ($files as $file) {
                $filepath = $file->store('public/Gallary');
                gallary::create([
                    'path' => $filepath,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

            }
            return Redirect::back()->withSuccess('The adding is done');

        }
    }

    public function deletePhoto(Request $request)
    {
        $id = $request->dataId;
        for ($i=0 ; $i<= count($id);$i++){
            gallary::whereIn('id', $id)->delete();
        }

        echo "done";
    }
    public function galleryUser(){
        $allPhoto = gallary::all();
        return view('mmpApp.gallery' , ["allGallary" =>$allPhoto]);
    }
}