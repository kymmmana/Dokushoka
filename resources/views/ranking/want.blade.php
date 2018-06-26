@extends('layouts.app')

@section('content')
   
        <strong>年間ランキング</strong>
        
        
    @include('books.books', ['books' => $books])
@endsection
