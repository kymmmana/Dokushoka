@if (Auth::user()->is_wanting($book->isbn))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::submit('Loving', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('isbn', $book->isbn) !!}
        {!! Form::submit('Love this', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endif
