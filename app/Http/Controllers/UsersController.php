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
        $count_want = $user->want_books()->count();
    
        $books = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);
        $want_books = $user->want_books()->paginate(20);
     
        $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(3);
        
        $count_reviews = $user->reviews()->count();
       

        return view('users.show', [
            'user' => $user,
            'books' => $books,
            'want_books' => $want_books,
           
            'reviews' => $reviews,
           
            'count_want' => $count_want,
            
            'count_reviews' => $count_reviews,
            
        ]);
    }

    
     public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'bio' => 'max:191',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        return redirect(route('users.show', \Auth::user()->id));
    }
    
    public function timeline($id)
    {
        $user = User::find($id);
        $timeline = $user->reviews()->paginate(10);
       $count_want = $user->want_books()->count();
        $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(3);
        $data = [
            'user' => $user,
            'timeline' => $timeline,
            'count_want' => $count_want,
            'reviews' => $reviews,
        ];

        $data += $this->counts($user);

        return view('users.timeline', $data);
    }
}
