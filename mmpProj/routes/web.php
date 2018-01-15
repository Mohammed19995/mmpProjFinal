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

Route::get('mmpApp/library' , function () {
    return view('mmpApp.library.library');
});
Route::get('mmpApp/libraryDetail' , function () {
    return view('mmpApp.library.libraryDetail');
});
Route::get('mmpApp/fatwa' , function () {
    return view('mmpApp.fatwa.fatwa');
});

Route::get('adminApp' , function () {
    return view('admin.app');
});

Route::get('adminApp/home'  , function () {
    return view('admin.index');
});
Route::get('adminApp/lib/addBook'  , function () {
    return view('admin.library.addBook');
});
Route::get('adminApp/lib/viewBook'  , function () {
    return view('admin.library.viewBook');
});

///////////////  Add Category form admin  /////////////////////////
///
Route::get('adminApp/lib/cat'  , 'LibraryCon@index');
Route::post('addCategory' ,'LibraryCon@addCategory' );
Route::get('editCat' ,'LibraryCon@editCat' );
Route::get('delCat' , 'LibraryCon@delCat');
/////////////////////////////////////////
Route::get('adminApp/fatawi/cat'  ,  'FatawiCon@index');
Route::post('addFatawiCat' ,'FatawiCon@addCategory' );
Route::get('delFatawiCat' ,'FatawiCon@delCategory' );
Route::get('editFatawiCat' ,'FatawiCon@editCategory' );


Route::post('testImg2' , function(\Illuminate\Http\Request $request) {
  //  echo $_FILES['file']['name'] . " " . $request->name1 . " " . $request->file->getClientOriginalName();
    $request->file->store('public/ff');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
