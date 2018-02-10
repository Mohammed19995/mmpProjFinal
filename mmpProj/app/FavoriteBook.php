<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class FavoriteBook extends Model
{
    protected $table = 'favorite_books';
    protected $fillable = ['book_id', 'user_id'];

    public function addFavoriteBook($book_id)
    {
        $this::create([
            'book_id' => $book_id,
            'user_id' => Auth::user()->id
        ]);
    }

    public function deleteFavoriteBook($book_id)
    {
        $user_id = Auth::user()->id;
        // Auth::user()->id;

        $getFavoriteBooUser = $this::where('book_id',$book_id)
        ->where('user_id',$user_id)
        ->first();

        $getFavoriteBooUser->delete();
    }

    public function getPaginateBook($user_id) {
        $objBook = new Book();
        $bookId = $this::where('user_id' , $user_id)->join('books' , 'favorite_books.book_id' , '=' , 'books.id')
        ->select('books.*')->paginate(8);
        return $bookId;

    }
}
