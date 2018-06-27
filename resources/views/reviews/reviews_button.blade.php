<div class="">
@foreach ($reviews as $review)
    <?php $user = $review->user; ?>
    <?php $book = $review->book; ?>
    <div class="card my-3">
        <div class="card-body p-4">
            <div class="row py-4">
                <div class="col-md-1 offset-md-1 col-4">
                    <img class="rounded-circle align-middle" src="/images/user{{ $user->id }}.jpg" alt="">
                </div>
                <div class="col-md-7 col-6">
                    <span class="">{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</span>
                    <span class="text-muted ml-3">{{ $review->created_at }}</span>
                    <br>
                    <span class=""><a href="books/{{ $book->id }}">{{ $book->title }}</a></span>
                </div>
                <div class="col-md-1 offset-md-1 col-1">
                    <div class="btn-group" role="group" aria-label="favorites">
                        @if(Auth::check())
                            @include('reviews.favorite_button', ['review' => $revirew])
                        @endif
                        <div class="text-warning mt-2">{{ $review->count_favorites() }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3 class="text-dark py-3 post-title">{!! nl2br(e($review->title)) !!}</h3>
                    <hr>
                    <p class="post-content">{!! $review->parsed_content() !!}</p>
                </div>
            </div>
            {!! link_to_route('reviews.edit', '編集', ['id' => $review->id]) !!}
            <div class="row">
                <div class="col-1 offset-10">
                    @if (Auth::id() == $review->user_id)
                        {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
{!! $reviews->render() !!}

