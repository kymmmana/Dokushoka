@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'books.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text( 'title', $s_title, ['class' => 'form-control input-lg', 'placeholder' => 'タイトルを入力', 'size' => 40]) !!}
                        {!! Form::text('author', $s_author, ['class' => 'form-control input-lg', 'placeholder' => '作者を入力', 'size' => 40]) !!}
                    </div>
                    {!! Form::submit('商品を検索', ['class' => 'btn btn-success btn-lg']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @include('books.books', ['books' => $books])
@endsection

