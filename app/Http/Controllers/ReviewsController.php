<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\User;

use \App\Book;

use \App\Review;

class ReviewsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $reviews = $user->reviews()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'reviews' => $reviews,
            ];
            $data += $this->counts($user);
            return view('users.show',$data);
        }else {
            return view('welcome');
        }
    }
    
    public function create(Request $request)
    {
        $user = \Auth::user();
        $bookId = $request->book_id;
        $book = Book::find($bookId);
        return view('reviews.create', [
        'user' => $user,
        'book' => $book,
      ]);
    }
    
    public function store(Request $request)
    {
         $this->validate($request, [
            'title' => 'required | max:191',
            'content' => 'required|max:20000',
            'book_id'=> 'required',
        ]);

        $request->user()->reviews()->create([
            'content' => $request->content,
            'title' => $request->title,
            'book_id' => $request->book_id,
        ]);
        return redirect()->back();
    }
    
     public function edit($id)
    {
        $user = \Auth::user();
        $post = Review::find($id);

        return view('reviews.edit', [
            'user' => $user,
            'review' => $review,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'content' => 'required|max:20000',
        ]);

        $review = Review::find($id);
        $review->title = $request->title;
        $review->content = $request->content;
        $review->book_id = $request->book_id;
        $review->save();

        return redirect('welcom');
    }
    
     public function destroy($id)
    {
        $review = \App\Review::find($id);

        if (\Auth::id() === $review->user_id) {
            $review->delete();
        }

        return redirect()->back();
    }
    
}
