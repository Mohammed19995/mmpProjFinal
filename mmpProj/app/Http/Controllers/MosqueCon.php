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

    public function __construct()
    {
        $this->objMosque = new Mosque();
        $this->objActivity = new Activity();
    }

    public function viewMosque()
    {
        $allMosque = Mosque::all();
        return view('admin.mosque.viewMosque', ['allMosque' => $allMosque]);
    }

    public function viewAddMosque()
    {
        return view('admin.mosque.addMosque');
    }

    public function addMosque(Request $request)
    {


        // |regex:/^[a-zA-Z0-9_ ]+$/u
        $validator = Validator::make($request->all(), [
            'nameMosque' => 'required',
            'checkIllegalName' => 'not_in:0',
            'checkIllegalCountry' => 'not_in:0',
            'checkIllegalCity' => 'not_in:0',
            'checkIllegalNameImam' => 'not_in:0',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'nameImam' => 'required',
            'email' => 'required|email|unique:mosques,email',
            'phone' => 'required|numeric',
            'checkImg' => 'not_in:0',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ], [
            'checkImg.not_in' => 'The field image is required',
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
            $objMosque->addMosque($name, $country, $city, $street, $imam_name, $email, $phone, $friday_prayer, $woman_chapel, $path, $lat, $lng);

            return response()->json(['success' => 1]);
        }

        return response()->json(['error' => $validator->errors()->all()]);


    }


    public function viewActivity()
    {

        $getBook = $this->objMosque->getAllBook();
        $getAllActivity = $this->objActivity->getAllActivity();
        return view('admin.mosque.activity', ['getBook' => $getBook, 'getAllActivity' => $getAllActivity]);

    }


    public function addActivity(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
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

            $this->objActivity->addActivity($request->title, $request->mosqueId, $request->activityName);
            return Redirect::back()->withSuccess('The adding is done');
        }

    }

    public function editActivity(Request $request)
    {


        //  updateActivity($id, $title, $mosque_id, $content)
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'mosqueId' => 'required',
            'contentData' => 'required'
        ]);
        $attributeNames = array(
            'mosqueId' => 'name of mosque',

        );
        $validator->setAttributeNames($attributeNames);


        if ($validator->passes()) {

            $id = $request->id_hidden;
            $title = $request->title;
            $mosqueId = $request->mosqueId;
            $contentData = $request->contentData;

            $this->objActivity->updateActivity($id, $title, $mosqueId, $contentData);

            return response()->json(['success' => 1]);
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function deleteActivity(Request $request)
    {
        $id = $request->id_hidden;
        $this->objActivity->deleteActivity($id);
    }

    public function deleteSelActivity(Request $request)
    {

        $arrDel = $request->id_hidden;
        for ($i = 0; $i < count($arrDel); $i++) {
            $this->objActivity->deleteActivity($arrDel[$i]);
        }
    }


    public function editMosque(Request $request)
    {
        $idMosque = $request->IdMosque;
        $validator = Validator::make($request->all(), [
            'nameMosque' => 'required',
            'nameImam' => 'required',
            'email' => 'required|email|unique:mosques,email,' . $idMosque,
            'phone' => 'required|numeric',

        ]);
        $attributeNames = array(
            'nameMosque' => 'Mosque Name',
            'nameImam' => 'Imam Name',
        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->passes()) {

            $idMosque = $request->IdMosque;
            $name = $request->nameMosque;
            $imam_name = $request->nameImam;
            $email = $request->email;
            $phone = $request->phone;
            $friday_prayer = $request->friday_prayer;
            $woman_chapel = $request->woman_chapel;
            $image = $request->file;
            $checkImgBook = $request->checkImgBook;

            $path = 0;
            if ($checkImgBook == 1) {
                $pathImgBook = $image->store('public/mosque/img');
                $this->objMosque->updateMosqueWithImg($idMosque, $name, $imam_name, $email, $phone, $friday_prayer, $woman_chapel, $pathImgBook);
                $path = $pathImgBook;

            } else {
                $this->objMosque->updateMosqueWithoutImg($idMosque, $name, $imam_name, $email, $phone, $friday_prayer, $woman_chapel);

            }
            return response()->json(['success' => 1, 'path' => $path]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function deleteMosque(Request $request)
    {
        $idMosque = $request->idMosque;
        $this->objMosque->deleteMosque($idMosque);

    }

    public function getUpdatLocation($id)
    {
        $allData = Mosque::all();

        return view('admin.mosque.updatLoction', ['idMosque' => $id]);
    }

    public static function getMosqueById($MosqueId)
    {
        $data = Mosque::where('id', $MosqueId)->first();
        return $data;
    }

    public function updateLocation(Request $request)
    {

        $idMosque = $request->IdMosque;
        $validator = Validator::make($request->all(), [

            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);
        $attributeNames = array(
            'lat' => 'Latitude',
            'lng' => 'Longitude',
        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->passes()) {

            $idMosque = $request->idMosque;
            $country = $request->country;
            $city = $request->city;
            $street = $request->street;
            $lat = $request->lat;
            $lng = $request->lng;

            $this->objMosque->updateLocation($idMosque, $country, $city, $street, $lat, $lng);
            return response()->json(['success' => 1]);
        }
        return response()->json(['error' => $validator->errors()->all()]);

    }


    //////////////////////////////////////////////////////////////

    ///////////////////////// Mosque in user /////////////////////////////

    public static function  nearestMosque($lat, $lng)
    {

        $getAllMoq = Mosque::all();
        $arr = [];
        foreach ($getAllMoq as $p) {

            $objMosq = new MosqueCon();
            $arr[$p->id] = $objMosq->getDistance($lat, $lng, $p->lat, $p->lng, 'k');
        }
        asort($arr);
        return $arr;
    }

    public static function nearestMosqueWithFriday($lat, $lng)
    {
        $getAllMoq = Mosque::where('friday_prayer', '=', 1)->get();
        $arr = [];
        foreach ($getAllMoq as $p) {
            $objMosq = new MosqueCon();
            $arr[$p->id] = $objMosq->getDistance($lat, $lng, $p->lat, $p->lng, 'k');
        }
        asort($arr);
        return $arr;
    }

    public static function nearestMosqueWithWomanPrayer($lat = 41.871940, $lng = 12.567380)
    {
        $getAllMoq = Mosque::where('woman_chapel', '=', 1)->get();
        $arr = [];
        foreach ($getAllMoq as $p) {
            $objMosq = new MosqueCon();
            $arr[$p->id] = $objMosq->getDistance($lat, $lng, $p->lat, $p->lng, 'k');
        }
        asort($arr);
        return $arr;
    }

    public static function nearestMosqueWithFridayAndWomanPrayer($lat = 41.871940, $lng = 12.567380)
    {
        $getAllMoq = Mosque::where('woman_chapel', '=', 1)
            ->where('friday_prayer', '=', 1)
            ->get();
        $arr = [];
        foreach ($getAllMoq as $p) {
            $objMosq = new MosqueCon();
            $arr[$p->id] = $objMosq->getDistance($lat, $lng, $p->lat, $p->lng, 'k');
        }
        asort($arr);
        return $arr;
    }


    public function getDistance($lat1, $lon1, $lat2, $lon2, $unit)
    {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }


    //////////////////////////// End mosque in user /////////////////////////////


}
