<?php

namespace App\Http\Controllers;

use App\fatawiCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class FatawiCon extends Controller
{
    protected $obj;
    protected $fillable = ['name'];

    public function __construct()
    {
        $this->obj = new fatawiCat();
    }
    public function index(){
      $allCat=  $this->obj->getAllCategory();
      return view('admin.fatawi.category', ['allCat' => $allCat]);
    }

    public function addCategory(Request $request){
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

    public function delCategory(Request $request){
        $id = $request->id_hiddenToDel;
       $d= $this->obj->deleteCategory($id);
       if($d){
           echo "done";
       }else{
           echo "The Category not deleted";
       }
    }
    public function editCategory(Request $request){
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
}
