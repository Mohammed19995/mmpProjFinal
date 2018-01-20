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




Route::get('mmpApp/fatwa' ,'FatawiCon@getIndex');

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
Route::get('adminApp/fatawi/cat'  ,  'FatawiCon@index');
Route::post('addFatawiCat' ,'FatawiCon@addCategory' );
Route::get('delFatawiCat' ,'FatawiCon@delCategory' );
Route::get('editFatawiCat' ,'FatawiCon@editCategory' );

                 //////////  ask question   /////////////
Route::get('addMessege' ,'FatawiCon@addMessage' );
Route::get('getUserFatwa' ,'FatawiCon@getUserFatwa' );

                ///////////// add question ////////////
Route::get('adminApp/addFatwa' ,'FatawiCon@addFatwaIndex' );
Route::get('addFatwa' ,'FatawiCon@addFatwa' );
Route::get('adminApp/showNotAnswer' ,'FatawiCon@showNotAnswer' );
Route::get('editAnswer' ,'FatawiCon@editAnswer' );
Route::get('adminApp/showAnswer' ,'FatawiCon@showAdvisory' );
Route::get('getData2' ,'FatawiCon@getData2' );
Route::get('editAdvisory' ,'FatawiCon@editAdvisory' );
Route::get('delAdvisory' ,'FatawiCon@delAdvisory' );
Route::get('getMufti' ,'FatawiCon@getMufti' );


////////////////////////////////////////////////////////////
Route::post('testImg2' , function(\Illuminate\Http\Request $request) {
  //  echo $_FILES['file']['name'] . " " . $request->name1 . " " . $request->file->getClientOriginalName();
    $request->file->store('public/ff');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
