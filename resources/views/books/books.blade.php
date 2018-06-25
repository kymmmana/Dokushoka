@if ($books)
    <div class="row">
        @foreach ($books as $key => $book)
            <!--div class="book"-->
                  <div class="col-lg-3 ">
                    <div class="book card bg-dark">
                            <img class= "book card-img" src="{{ $book->image_url }}" alt="" >
                        <div class="mask">
                            @if ($book->id)
                            <p class="card-title caption show-more"><a class=caption href="{{ route('books.show', $book->id) }}">Show more...</a></p>
                          
                            @else
                            <p class="card-title caption"><a class=caption href="{{ $book->url }}">{{ $book->title }}</a></p>
                            <p class="card-title caption">作者:<a class=caption href="">{{ $book->author }}</a></p>
                              @endif  
                        <div class="buttons text-center caption">
                            @if (Auth::check())
                                @include('books.want_button', ['book' => $book])
                            @endif
                        </div>
                    </div>
                    @if (isset($book->count))
                            <div class="card-footer">
                                <p class="text-center">{{ $key+1 }}位: {{ $book->count}} People</p>
                            </div>
                        @endif
                    </div>
                </div>
            
            <!--/div-->
        @endforeach
    </div>
@endif
