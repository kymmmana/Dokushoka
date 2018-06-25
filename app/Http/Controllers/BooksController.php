<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
 
 use \App\Book;

  class BooksController extends Controller
  {

    public function create()
    {
        $s_title = request()->title;
        $s_author = request()->author;
        $books = [];
        if (isset($s_title) or isset($s_author)) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('BooksBookSearch', [
                'title' => $s_title,
                'author' => $s_author,
                'imageFlag' => 1,
               
            ]);

            // Creating "Item" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['Items'] as $rws_book) {
                $book = new Book();
                $book->isbn = $rws_book['Item']['isbn'];
                $book->title = $rws_book['Item']['title'];
                $book->author = $rws_book['Item']['author'];
               $book->itemCaption = $rws_book['Item']['itemCaption'];
                $book->url = $rws_book['Item']['itemUrl'];
                $book->image_url = str_replace('?_ex=120x120', '', $rws_book['Item']['mediumImageUrl']);
                $books[] = $book;
            }
        }

        return view('books.create', [
            's_title' => $s_title,
            's_author' => $s_author,
            'books' => $books,
        ]);
    }
    
        public function show($id)
    {
      $book = Book::find($id);
      $want_users = $book->want_users;
      $itemCaption = $book->itemCaption;

      return view('books.show', [
          'book' => $book,
          'want_users' => $want_users,
          'itemCaption' => $itemCaption
      ]);
    }
  }
