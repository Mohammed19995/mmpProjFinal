<?php

namespace App\Http\Controllers;

use App\category;
use App\Filelang;
use App\Filetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class LibraryCon extends Controller
{
    protected $obj;
    protected $objFileLang;
    protected $objFiletype;

    public function __construct()
    {
        $this->obj = new category();
        $this->objFileLang = new Filelang();
        $this->objFiletype = new Filetype();
    }

    /*         Category       */
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
        if ($a) {
            echo "done";
        } else {
            echo "errro";
        }
    }

    /*                           */


    /*  Book */

    public function viewAddBook()
    {
        $getAllCat = $this->obj->getAllCategory();
        $getAllLang = $this->objFileLang->getAllLang();
        $getAllType = $this->objFiletype->getAllType();
        return view('admin.library.addBook', ['getAllCat' => $getAllCat, 'getAllLang' => $getAllLang, 'getAllType' => $getAllType]);
    }

    public function addBook(Request $request)
    {
        //echo $request->file->getClientOriginalName();

        $validator = Validator::make($request->all(), [
            'nameBook' => 'required',
            'editionBook' => 'required|numeric',
            'summary' => 'required',
            'checkImgBook' => 'not_in:0',
            'selCatVal' => 'required',
            'datePublish' => 'required',
            'author' => 'required',
            'keyword' => 'required',
            'outline' => 'required',
            'checkDataLang' => 'not_in:0',


        ] , [
            'checkImgBook.not_in' => "The image book is required." ,
            'checkDataLang.not_in' => "Language fields is required"
        ]);
        $attributeNames = array(
            'checkDataLang' => 'Language fields',
            'checkImgBook' => 'image book'

        );
        $validator->setAttributeNames($attributeNames);
        /*
       $arrFileLength = $request->arrFileLength;
       $a = [];
       for($i=0; $i<$arrFileLength ; $i++) {
           $fileName = "arrFile".$i;
           array_push($a , $request->$fileName);
       }
*/
        if ($validator->passes()) {

            return response()->json(['success' => 1]);
        }
        return response()->json(['error' => $validator->errors()->all()]);

    }


    /*     */
}
