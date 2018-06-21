@if ($books)
    <div class="row">
        @foreach ($books as $book)
            <div class="book">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $book->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            @if ($book->id)
                            <p class="book-title">タイトル:<a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></p>
                            <p class="book-title">作者:<a href="">{{ $book->author }}</a></p>
                           @else
                               <p class="book-title">タイトル:<a href="{{ $book->url }}">{{ $book->title }}</a></p>
                            <p class="book-title">作者:<a href="">{{ $book->author }}</a></p>
                              @endif
                              
                        <div class="buttons text-center">
                            @if (Auth::check())
                                @include('books.want_button', ['book' => $book])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endif
