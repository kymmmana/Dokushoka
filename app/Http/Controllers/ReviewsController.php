<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

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
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }
    
    public function store(Request $request)
    {
        

        $request->user()->reviews()->create([
            'content' => $request->content,
        ]);

        return redirect()->back();
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
