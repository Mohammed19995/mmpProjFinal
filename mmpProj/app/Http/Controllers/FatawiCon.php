<?php

namespace App\Http\Controllers;

use App\fatawi;
use App\fatawiCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FatawiCon extends Controller
{
    protected $obj;
    protected $obj2;


    public function __construct()
    {
        $this->obj = new fatawiCat();
        $this->obj2 = new fatawi();
    }

    ////////////////////////////////////////////////////////////////////
    public function index()
    {
        $allCat = $this->obj->getAllCategory();
        return view('admin.fatawi.category', ['allCat' => $allCat]);
    }

    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|unique:fatawi_cats,name',
        ]);
//
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {

            $this->obj->addCategory($request->categoryName);
            return Redirect::back()->withSuccess('The adding is done');
        }

    }

    public function delCategory(Request $request)
    {
        $id = $request->id_hiddenToDel;
        $d = $this->obj->deleteCategory($id);
        if ($d) {
            echo "done";
        } else {
            echo "The Category not deleted";
        }
    }

    public function editCategory(Request $request)
    {
        $id = $request->id_hidden;
        $name = $request->m_name;

        $validator = Validator::make($request->all(), [
            'm_name' => 'required|unique:fatawi_cats,name,' . $id . ',id',
        ]);
        $attributeNames = array(
            'm_name' => 'category',

        );
        $validator->setAttributeNames($attributeNames);
        if ($validator->passes()) {
            $this->obj->editCat($id, $name);
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);


    }
    /////////////////////////////////////////////////////////////////////////////

    public function addMessage(Request $request)
    {
        $subject = $request->subject;
        $message = $request->message;
        $category = $request->category;
        $private = $request->private;

        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'message' => 'required',
            'category' => 'required',


        ]);
        $attributeNames = array(
            'subject' => 'subject',

        );
        $validator->setAttributeNames($attributeNames);
        if ($validator->passes()) {
            if (Auth::check()) {
                $a = Auth::user()->id;
                $this->obj2->addFatwa($subject, $message, $a, $category, $private);

            } else {
                echo 1;
            }
            return response()->json(['success' => 'The masseg has been send']);
        }
        return response()->json(['error' => $validator->errors()->all()]);



    }
    public function getIndex(Request $request){
        $allCat= \App\fatawiCat::all();
        $allAnswer = fatawi::where('answer','<>',"")->get();
        $userId= Auth::user()->id;
        $userFatwa = fatawi::where('user_id' ,$userId)->where('answer','<>',"")->where('private',1)->get();

        return view('mmpApp.fatwa.fatwa',['allCat'=>$allCat , 'allAnswer'=>$allAnswer , 'userFatwa'=>$userFatwa]);
    }


}
