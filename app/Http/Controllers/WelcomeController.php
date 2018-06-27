<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;
use App\Review;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->paginate(20);
          $reviews = Review::orderBy('updated_at', 'desc')->paginate(10);
        return view('welcome', [
            'books' => $books,
            'reviews' => $reviews,
        ]);
    }
}
