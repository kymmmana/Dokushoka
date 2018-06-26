<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
use App\Review;
use App\Book;

class UsersController extends Controller
{
     public function show($id)
    {
        $user = User::find($id);
        $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);
        $count_want = $user->want_books()->count();
        $books = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);


$data = [ 'user' => $user,
          'reviews' => $reviews
          
    ];
    
     $data += $this->counts($user);

    
        return view('users.show',$data, [
           
            'books' => $books,
            'count_want' => $count_want,
            
            
        ]);
    }
}
