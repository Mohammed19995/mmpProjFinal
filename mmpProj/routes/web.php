<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('mmpApp' , function () {
    return view('mmpApp.mmpApp');
});

Route::get('mmpApp/index' , function () {
    return view('mmpApp.index');
});

Route::get('mmpApp/gallery' , function () {
    return view('mmpApp.gallery');
});

Route::get('mmpApp/galleryDetail' , function () {
    return view('mmpApp.galleryDetail');
});




Route::get('mmpApp/advisory' ,'FatawiCon@getIndex');

Route::get('adminApp' , function () {
    return view('admin.app');
});

Route::get('adminApp/home'  , function () {
    return view('admin.index');
});



///////////////  Add Category form admin  /////////////////////////
///
Route::get('adminApp/lib/addBook'  ,'LibraryCon@viewAddBook' );
Route::get('adminApp/lib/cat'  , 'LibraryCon@index');
Route::post('addCategory' ,'LibraryCon@addCategory' );
Route::get('editCat' ,'LibraryCon@editCat' );
Route::get('delCat' , 'LibraryCon@delCat');

/////////////////////  library admin  ///////////////////////////////////////
Route::post('addBook' , 'LibraryCon@addBook');

Route::get('adminApp/lib/viewBook'  ,'LibraryCon@viewBook' );
Route::post('editBook' , 'LibraryCon@editBook');
Route::get('deleteBook' , 'LibraryCon@deleteBook');
Route::get('getPlusData' , 'LibraryCon@getPlusData');
Route::get('editFileTypeLang' ,'LibraryCon@editFileTypeLang');
Route::get('delFileDetail' , 'LibraryCon@delFileDetail');
Route::post('addNewFileBookPlus' , 'LibraryCon@addNewFileBookPlus');

Route::get('downloadFile/{name}' , function($name) {
    $a = public_path()."/storage/book/typeFile/".$name;
    return response()->download($a);
});

/////////////////////   library user    //////////////////////////////
Route::get('mmpApp/library' , 'LibraryCon@ViewBookUser');
Route::get('mmpApp/library/{cat_id}' , 'LibraryCon@ViewBookCatUser');
Route::get('mmpApp/libraryDetail/{id}' , 'LibraryCon@viewUniqueBook');
Route::post('resultSearch' , 'LibraryCon@resultSearch');









































////////////////////    Fatawi     /////////////////////
///
                /////// addCategory //////////////
Route::get('adminApp/fatawi/cat'  ,  'FatawiCon@index')->middleware('adminPage');
Route::post('addFatawiCat' ,'FatawiCon@addCategory' )->middleware('adminPage');
Route::get('delFatawiCat' ,'FatawiCon@delCategory' )->middleware('adminPage');
Route::get('editFatawiCat' ,'FatawiCon@editCategory' )->middleware('adminPage');

                 //////////  user section   /////////////
Route::get('addMessege' ,'FatawiCon@addMessage' );
Route::get('getUserFatwa' ,'FatawiCon@getUserFatwa' );
Route::get('mmpApp/advisory/{cat_id}' , 'FatawiCon@viewAdvisoryCat');
Route::get('mmpApp/advisory2/{mufti_name}' , 'FatawiCon@viewAdvisoryMufti');
Route::post('resultSearch' ,'FatawiCon@resultSearch' );

                ///////////// add question ////////////
Route::get('adminApp/addFatwa' ,'FatawiCon@addFatwaIndex' )->middleware('adminPage');
Route::get('addFatwa' ,'FatawiCon@addFatwa' )->middleware('adminPage');
Route::get('adminApp/showNotAnswer' ,'FatawiCon@showNotAnswer' )->middleware('adminPage');
Route::get('editAnswer' ,'FatawiCon@editAnswer' )->middleware('adminPage');
Route::get('adminApp/showAnswer' ,'FatawiCon@showAdvisory' )->middleware('adminPage');
Route::get('getData2' ,'FatawiCon@getData2' )->middleware('adminPage');
Route::get('editAdvisory' ,'FatawiCon@editAdvisory' )->middleware('adminPage');
Route::get('delAdvisory' ,'FatawiCon@delAdvisory' )->middleware('adminPage');
Route::get('getMufti' ,'FatawiCon@getMufti' )->middleware('adminPage');


////////////////////////////////////////////////////////////
Route::post('testImg2' , function(\Illuminate\Http\Request $request) {
  //  echo $_FILES['file']['name'] . " " . $request->name1 . " " . $request->file->getClientOriginalName();
    $request->file->store('public/ff');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
