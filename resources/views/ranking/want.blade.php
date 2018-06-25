@extends('layouts.app')

@section('content')
    <h1>年間ランキング</h1>
    @include('books.books', ['books' => $books])
@endsection
