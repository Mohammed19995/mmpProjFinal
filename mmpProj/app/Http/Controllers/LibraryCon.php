<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class LibraryCon extends Controller
{
    protected $obj;

    public function __construct()
    {
        $this->obj = new category();
    }

    public function index()
    {
        $allCat = $this->obj->getAllCategory();
        return view('admin.library.category', ['allCat' => $allCat]);
    }

    public function addCategory(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name',
        ]);
//
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {

            $this->obj->addCategory($request->categoryName);
            return Redirect::back()->withSuccess('The adding is done');
        }

    }

    public function editCat(Request $request)
    {
        $id = $request->id_hidden;
        $name = $request->m_name;


        $validator = Validator::make($request->all(), [
            'm_name' => 'required|unique:categories,name,' . $id . ',id',
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

    public function delCat(Request $request)
    {
        $id = $request->id_hiddenToDel;
        $a = $this->obj->delCat($id);
        if($a) {
            echo "done";
        }else {
            echo "errro";
        }
    }
}
