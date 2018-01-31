<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Mosque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class MosqueCon extends Controller
{
    //


    protected $objMosque;
    protected $objActivity;
    public function __construct() {
        $this->objMosque = new Mosque();
        $this->objActivity = new Activity();
    }

    public function viewAddMosque() {
        return view('admin.mosque.addMosque');
    }

    public function addMosque(Request $request) {


        // |regex:/^[a-zA-Z0-9_ ]+$/u
        $validator = Validator::make($request->all(), [
            'nameMosque' => 'required',
            'checkIllegalName' => 'not_in:0' ,
            'checkIllegalCountry' => 'not_in:0' ,
            'checkIllegalCity' => 'not_in:0' ,
            'checkIllegalNameImam' => 'not_in:0' ,
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'nameImam' => 'required',
            'email' => 'required|email|unique:mosques,email',
            'phone' => 'required|numeric',
            'checkImg'=>'not_in:0' ,
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ] , [
            'checkImg.not_in' => 'The field image is required' ,
            'checkIllegalName.not_in' => 'The name mosque is format invalid',
            'checkIllegalCountry.not_in' => 'The country is format invalid',
            'checkIllegalCity.not_in' => 'The city is format invalid',
            'checkIllegalNameImam.not_in' => 'The name imam is format invalid',
        ]);

        $attributeNames = array(
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->passes()) {

            $name = $request->nameMosque;
            $country = $request->country;
            $city = $request->city;
            $street = $request->street;
            $imam_name = $request->nameImam;
            $email = $request->email;
            $phone = $request->phone;
            $friday_prayer = $request->friday_prayer;
            $woman_chapel = $request->woman_chapel;
            $image = $request->file;
            $lat = $request->lat;
            $lng = $request->lng;

            $path = $request->file->store('public/mosque/img');
            $objMosque = new Mosque();
            $objMosque->addMosque($name ,$country,$city ,$street , $imam_name ,$email ,$phone , $friday_prayer ,$woman_chapel , $path , $lat , $lng  );

            return response()->json(['success'=>1]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);


    }


    public function viewActivity() {

        $getBook = $this->objMosque->getAllBook();
        $getAllActivity = $this->objActivity->getAllActivity();
        return view('admin.mosque.activity' , ['getBook' =>$getBook , 'getAllActivity' => $getAllActivity]);

    }

    public function addActivity(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required' ,
            'mosqueId' => 'required',
            'activityName' => 'required'
        ]);
        $attributeNames = array(
            'mosqueId' => 'name of mosque',

        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {

            $this->objActivity->addActivity($request->title  , $request->mosqueId , $request->activityName);
            return Redirect::back()->withSuccess('The adding is done');
        }

    }

}
