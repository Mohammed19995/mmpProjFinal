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

Route::get('mmpApp', function () {
    return view('mmpApp.mmpApp');
});

Route::get('mmpApp/index', function () {
    return view('mmpApp.index');
});

Route::get('mmpApp/gallery', function () {
    return view('mmpApp.gallery');
});

Route::get('mmpApp/galleryDetail', function () {
    return view('mmpApp.galleryDetail');
});


Route::get('mmpApp/advisory', 'FatawiCon@getIndex');

Route::get('adminApp', function () {
    return view('admin.app');
});

Route::get('adminApp/home', function () {
    return view('admin.index');
});


///////////////  Add Category form admin  /////////////////////////
///
Route::get('adminApp/lib/addBook', 'LibraryCon@viewAddBook');
Route::get('adminApp/lib/cat', 'LibraryCon@index');
Route::post('addCategory', 'LibraryCon@addCategory');
Route::get('editCat', 'LibraryCon@editCat');
Route::get('delCat', 'LibraryCon@delCat');

/////////////////////  library admin  ///////////////////////////////////////
Route::post('addBook', 'LibraryCon@addBook');

Route::get('adminApp/lib/viewBook', 'LibraryCon@viewBook');
Route::post('editBook', 'LibraryCon@editBook');
Route::get('deleteBook', 'LibraryCon@deleteBook');
Route::get('deleteSelBook'  ,'LibraryCon@deleteSelBook');
Route::get('getPlusData', 'LibraryCon@getPlusData');
Route::get('editFileTypeLang', 'LibraryCon@editFileTypeLang');
Route::get('delFileDetail', 'LibraryCon@delFileDetail');
Route::post('addNewFileBookPlus', 'LibraryCon@addNewFileBookPlus');

Route::get('downloadFile/{name}', function ($name) {
    $a = public_path() . "/storage/book/typeFile/" . $name;
    return response()->download($a);
});

/////////////////////   library user    //////////////////////////////
Route::get('mmpApp/library', 'LibraryCon@ViewBookUser');
Route::get('mmpApp/library/{cat_id}', 'LibraryCon@ViewBookCatUser');
Route::get('mmpApp/library/{year}/{cat_id}', 'LibraryCon@ViewBookCatYear');
Route::get('mmpApp/libraryAchive/{year}', 'LibraryCon@ViewBookArchive');
Route::get('mmpApp/libraryDetail/{id}', 'LibraryCon@viewUniqueBook');
Route::post('resultSearchLib', 'LibraryCon@resultSearch');
Route::get('resultSearchAuhtor/{author}', 'LibraryCon@resultSearchAuthor');
Route::get('d/{year}', 'LibraryCon@getCatForYear');

//////////////////////  Mosque admin    ////////////////////////
Route::get('adminApp/mosque/addMosque', 'MosqueCon@viewAddMosque');
Route::post('addMosque', 'MosqueCon@addMosque');
Route::get('adminApp/mosque/activity' , 'MosqueCon@viewActivity');
Route::post('Mosque/addActivity' , 'MosqueCon@addActivity');
Route::get('editActivity' ,'MosqueCon@editActivity');
Route::get('deleteActivity' ,'MosqueCon@deleteActivity');
Route::get('deleteSelActivity' ,'MosqueCon@deleteSelActivity');
Route::get('seed1', function() {

    /*
    $query = \App\Book::join('categories' , 'books.cat_id' , '=' , 'categories.id')
            ->select('books.id As IdBook' ,'categories.name As catName' , 'categories.id As IdCat')->get();
*/
    $query = \App\Book::all()->groupBy('cat_id');
    dd($query[4]);

});
Route::get('testD' , 'MosqueCon@testNearestMosque');
Route::get('test' , function() {
    return view('test');
});

////////////////////  mosque user //////////////
/// Route::get('adminApp/mosque/viewMosque', 'MosqueCon@viewMosque');
Route::post('editMosque', 'MosqueCon@editMosque');
Route::get('deleteMosque', 'MosqueCon@deleteMosque');
Route::get('adminApp/mosque/getUpdatLocation/{id}', 'MosqueCon@getUpdatLocation');
Route::post('updateLocation', 'MosqueCon@updateLocation');
Route::get('mosque', 'MosqueCon@getALlMosque');

Route::get('mosqueLoc' , function() {
    return view('mmpApp.mosque.mosqueLocation');
});
Route::get('addCurrLoc' , 'MosqueCon@addCurrLoc');
/////////////////////////////////////////////////////////////




















////////////////////    Fatawi     /////////////////////
///
/////// addCategory //////////////
Route::get('adminApp/fatawi/cat', 'FatawiCon@index')->middleware('adminPage');
Route::post('addFatawiCat', 'FatawiCon@addCategory')->middleware('adminPage');
Route::get('delFatawiCat', 'FatawiCon@delCategory')->middleware('adminPage');
Route::get('editFatawiCat', 'FatawiCon@editCategory')->middleware('adminPage');

//////////  user section   /////////////
Route::get('addMessege', 'FatawiCon@addMessage');
Route::get('getUserFatwa', 'FatawiCon@getUserFatwa');
Route::get('mmpApp/advisory/{cat_id}', 'FatawiCon@viewAdvisoryCat');
Route::get('mmpApp/advisory2/{mufti_name}', 'FatawiCon@viewAdvisoryMufti');
Route::post('resultSearch', 'FatawiCon@resultSearch');

///////////// add question ////////////
Route::get('adminApp/addFatwa', 'FatawiCon@addFatwaIndex')->middleware('adminPage');
Route::get('addFatwa', 'FatawiCon@addFatwa')->middleware('adminPage');
Route::get('adminApp/showNotAnswer', 'FatawiCon@showNotAnswer')->middleware('adminPage');
Route::get('editAnswer', 'FatawiCon@editAnswer')->middleware('adminPage');
Route::get('adminApp/showAnswer', 'FatawiCon@showAdvisory')->middleware('adminPage');
Route::get('getData2', 'FatawiCon@getData2')->middleware('adminPage');
Route::get('editAdvisory', 'FatawiCon@editAdvisory')->middleware('adminPage');
Route::get('delAdvisory', 'FatawiCon@delAdvisory')->middleware('adminPage');
Route::get('getMufti', 'FatawiCon@getMufti')->middleware('adminPage');


////////////////////////////////////////////////////////////
Route::post('testImg2', function (\Illuminate\Http\Request $request) {
    //  echo $_FILES['file']['name'] . " " . $request->name1 . " " . $request->file->getClientOriginalName();
    $request->file->store('public/ff');
});


Route::get('mail', function (\Illuminate\Http\Request $request) {
    $question = $request->e_question;
    $answer = $request->e_answer;
    $mufti = $request->e_mufti;
    $email = $request->e_email;
    $id = $request->e_id_hidden;


    Mail::send('email.welcome', ['question' => $question, 'answer' => $answer, 'mufti' => $mufti], function ($message) use ($email) {
        $message->to($email, 'USER')->subject('The question is answered ');
        $message->from('aboserage.2015@gmail.com');

    });
    echo("The massage email has been send");

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


