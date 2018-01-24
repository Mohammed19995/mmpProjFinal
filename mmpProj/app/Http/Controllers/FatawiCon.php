<?php

namespace App\Http\Controllers;

use App\fatawi;
use App\fatawiCat;
use App\privacy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class FatawiCon extends Controller
{
    protected $obj;
    protected $obj2;

   ///////////////// create object from fatewi_category  and fatwi//////////////////////////
    public function __construct()
    {
        $this->obj = new fatawiCat();
        $this->obj2 = new fatawi();
    }



    /////////////////////////    start user section         //////////////////////////////////

                     ////////////////  Add Message when user asked/////////////////////////////
    public function addMessage(Request $request)
    {

        $message = $request->message;
        $category = $request->category;
        $private = $request->private;

        $validator = Validator::make($request->all(), [

            'message' => 'required',
            'category' => 'required',


        ]);
        $attributeNames = array();
        $validator->setAttributeNames($attributeNames);
        if (Auth::check()) {
            if ($validator->passes()) {

                $a = Auth::user()->id;
                $this->obj2->addFatwa($message, $a, $category, $private);


                return response()->json(['success' => 'The masseg has been send']);
            }
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            echo 1;


        }
    }
                    ////////////////////// get index user page/////////////////////////////////
    public function getIndex(Request $request)
    {
        $allCat = \App\fatawiCat::all();
        $allAnswer = fatawi::where('answer', '<>', "")->where('private', 0)->paginate(10);
        $id_cat = 0;
        $userFatwa = "";
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userFatwa = fatawi::where('user_id', $userId)->where('answer', '<>', "")->where('private', 1)->get();
        }
        return view('mmpApp.fatwa.fatwa', ['allCat' => $allCat, 'allAnswer' => $allAnswer, 'userFatwa' => $userFatwa, 'id_cat' => $id_cat]);
    }
                    ////////////////////// get index user page with spacific category/////////////
    public function  viewAdvisoryCat ($id_cat)
    {
        $allCat = \App\fatawiCat::all();
        $allAnswer = fatawi::where('answer', '<>', "")->where('private', 0)->where('cat_id',$id_cat)->paginate(10);
        $userFatwa = "";
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userFatwa = fatawi::where('user_id', $userId)->where('answer', '<>', "")->where('private', 1)->get();
        }

        return view('mmpApp.fatwa.fatwa', ['allCat' => $allCat, 'allAnswer' => $allAnswer ,'userFatwa'=>$userFatwa , 'id_cat'=>$id_cat]);

    }

    public function viewAdvisoryMufti($mufti_name){
        $allCat = \App\fatawiCat::all();
        $allAnswer = fatawi::where('answer', '<>', "")->where('private', 0)->where('mufti',$mufti_name)->paginate(10);
        $userFatwa = "";
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $userFatwa = fatawi::where('user_id', $userId)->where('answer', '<>', "")->where('private', 1)->get();
        }

        return view('mmpApp.fatwa.fatwa', ['allCat' => $allCat, 'allAnswer' => $allAnswer ,'userFatwa'=>$userFatwa,'id_cat'=>0 ]);


    }
                    ////////////////////// count advisory in category ////////////////////

    public static function countAdvisoryCat($id_cat){

        return count( fatawi::where('cat_id',$id_cat)->get());
    }

                //////////////////// search section /////////////////////////////
      public function resultSearch(Request $request)
{

$keyword = $request->search;
$result = fatawi::SearchByKeyword($keyword)->get();
return view('mmpApp.fatwa.resultSearchAdvisory',['result'=>$result] );

}

    //////////////////////////////////////////   End user section ///////////////////////////////////////////////


    //////////////////////////////////////////   start admin section ///////////////////////////////////////////////


                 //////////////   category section in admin       /////////////////
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

                 ////////////////  End category section      //////////////////

                 /////////////////// start add section  ///////////////////////
    public function addFatwaIndex()
    {
        $allCat = $this->obj->getAllCategory();
        return view('admin.fatawi.addFatwa', ['allCat' => $allCat]);
    }

    public function addFatwa(Request $request)
    {
        $question = $request->question;
        $answer = $request->answer;
        $category = $request->category;
        $mufti = $request->mufti;
        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
            'category' => 'required',
            'mufti' => 'required'

        ]);
        $attributeNames = array();
        $validator->setAttributeNames($attributeNames);
        if (Auth::check()) {
            if ($validator->passes()) {
                $userId = Auth::user()->id;
                $this->obj2->addAdminFatwa($question, $answer, $mufti, $userId, $category);
                return response()->json(['success' => 'done']);
            }
            return response()->json(['error' => $validator->errors()->all()]);

        } else {
            echo 1;
        }
    }
                 /////////////////// End add section  ///////////////////////

                ///////////////////// start operation from advisory Not answer///////////////
    public function showNotAnswer()
    {
        $allCat = $this->obj->getAllCategory();
        $allNotA = $this->obj2->getNotAnswer();
        return view('admin.fatawi.AdvisoryNotAnswer', ['allCat' => $allCat, 'allNotA' => $allNotA]);
    }
    public function editAnswer(Request $request)
    {
        $e_question = $request->e_question;
        $e_id_hidden = $request->e_id_hidden;
        $e_answer = $request->e_answer;
        $e_mufti = $request->e_mufti;
        $e_cat = $request->e_cat;

        $validator = Validator::make($request->all(), [
            'e_question' => 'required',
            'e_answer' => 'required',
            'e_mufti' => 'required',



        ]);
        $attributeNames = array(
            'e_question' => 'question',
            'e_answer' => 'answer',
            'e_mufti' => 'mufti',


        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->passes()) {
            $this->obj2->editAnswer($e_id_hidden, $e_answer, $e_mufti, $e_cat);



            return response()->json(['success' => 'Added new Answer.']);
        }
        return response()->json(['error' => $validator->errors()->all()]);


    }
                 ///////////////////// End operation from advisory Not answer///////////////

               ///////////////////////// start operation from advisory  answered///////////////////////
    public function showAdvisory()
    {
        $allCat = $this->obj->getAllCategory();
        $allAdvisory = $this->obj2->getAllAdvisory();


        return view('admin.fatawi.allAdvisory', ['allCat' => $allCat ,'allAdvisory'=>$allAdvisory ]);
    }
    public function getData2(Request $request){
        $m_supCat = $request->m_supCat;
       $arrSup = fatawi::where('cat_id', $m_supCat)->get();
           echo json_encode($arrSup);;
    }
    public function getMufti(Request $request){
        $muftiSelect = $request->muftiSelect;
        $arrSup = fatawi::where('mufti',  $muftiSelect)->get();
        echo json_encode($arrSup);;
    }
    public function editAdvisory(Request $request){
        $e_id_hidden = $request->e_id_hidden;
        $e_qustion = $request->e_question;
        $e_answer = $request->e_answer;
        $e_mufti = $request->e_mufti;
        $e_cat = $request->e_cat;
        $validator = Validator::make($request->all(), [
            'e_answer' => 'required',
            'e_question' => 'required',
            'e_mufti' => 'required',


        ]);
        $attributeNames = array(

'e_answer'=>'Answer',
            'e_question' => 'Question',
            'e_mufti' => 'Mufti Name',
        );
        $validator->setAttributeNames($attributeNames);

        if ($validator->passes()) {
            $this->obj2->editAdvisory($e_id_hidden,$e_qustion ,$e_answer, $e_mufti, $e_cat);



            return response()->json(['success' => 'Updated is Done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);

    }
    public function delAdvisory(Request $request){
        $id = $request->id_hide;
        $this->obj2->delAdvisory($id);
    }
                   ////////////////End operation from advisory  answered//////////////////////////

                      //////////////////// get spacific name from Id ///////////////////////
    public static function getNameCat($catId)
    {
        $data = fatawiCat::where('id', $catId)->first();
        return $data;
    }

    public static function getPrivacy($priId)
    {
        $data = privacy::where('id', $priId)->first();
        return $data;
    }
    public static function getUserName($userId)
    {
        $data = User::where('id', $userId)->first();
        return $data;
    }
    //////////////////////////////////////////   End  admin section ///////////////////////////////////////////////
    ///
    ///


}
