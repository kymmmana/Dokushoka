<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class BookUserController extends Controller
{
    public function want()
    {
        $isbn = request()->isbn;

        // Search items from "itemCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'isbn' => $isbn,
        ]);
        $rws_book = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $book = Book::firstOrCreate([
            'isbn' => $rws_book['isbn'],
            'title' => $rws_book['title'],
            'author' => $rws_book['author'],
            'itemCaption' => $rws_book['itemCaption'],
            'url' => $rws_book['itemUrl'],
            // remove "?_ex=128x128" because its size is defined
            'image_url' => str_replace('?_ex=120x120', '', $rws_book['mediumImageUrl']),
        ]);

        \Auth::user()->want($book->id);

        return redirect()->back();
    }

    public function dont_want()
    {
        $isbn = request()->isbn;

        if (\Auth::user()->is_wanting($isbn)) {
            $itemId = Book::where('isbn', $isbn)->first()->id;
            \Auth::user()->dont_want($itemId);
        }
        return redirect()->back();
    }
}
