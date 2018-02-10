<?php

namespace App\Http\Controllers;

use App\Book;
use App\category;
use App\FavoriteBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class Favorite extends Controller
{

    public function favoriteBook()
    {
        $userId = Auth::user()->id;
        // Auth::user()->id;
        $objCat = new category();
        $objFav = new FavoriteBook();

        $paginateBook = $objFav->getPaginateBook($userId);
        $getAllCat = $objCat->getAllCategory();
        $getAllYear = $this->getAllYear();
        $getAllFavoriteForUser = FavoriteBook::where('user_id', $userId)->get();
        $moreDetail = 0;
        return view('mmpApp.library.favorite', ['paginateBook' => $paginateBook, 'getAllYear' => $getAllYear, 'getAllCat' => $getAllCat,
            'cat' => 'all', 'moreDetail' => $moreDetail, 'getAllFavoriteForUser' => $getAllFavoriteForUser]);
    }

    public function addFavoriteBook(Request $request)
    {

        $objFavorite = new FavoriteBook();
        $objFavorite->addFavoriteBook($request->bookIdHidden);
    }

    public function deleteFavoriteBook(Request $request)
    {

        $objFavorite = new FavoriteBook();
        $objFavorite->deleteFavoriteBook($request->bookIdHidden);
    }

    public function getAllYear()
    {
        $objBook = new Book();
        $getAllBook = $objBook->getAllBook();
        $arrYear = [];
        foreach ($getAllBook as $p) {
            array_push($arrYear, $p->publish->format('Y'));
        }
        $arrYear = array_unique($arrYear);

        return $arrYear;
    }

    public function resultSearchLibFav(Request $request)
    {
        $objBook = new Book();
        $keyword = Input::get('search', '');

        $resultBook = Book::SearchByKeyword($keyword)->get();

        $arrResult = [];
        foreach ($resultBook as $p) {
            array_push($arrResult, $p->id);
        }
        $arrResult = array_unique($arrResult);

        $getAllFavoriteForUser = FavoriteBook::where('user_id', Auth::user()->id)->get();


        $arrFinalResult = [];

        foreach ($getAllFavoriteForUser as $a) {
            foreach ($arrResult as $item) {
                if($item == $a->book_id) {
                    array_push($arrFinalResult , $item);
                }
            }
        }


        $getBookData = [];
        foreach ($arrFinalResult as $item) {
            array_push($getBookData, $objBook->getBookData($item));
        }


        return view('mmpApp.library.resultSearch', ['paginateBook' => $getBookData, 'keyword' => $keyword,
            'getAllFavoriteForUser' => $getAllFavoriteForUser]);
    }

}
