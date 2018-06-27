<ul class="media-list">
@foreach ($reviews as $review)
    <?php $user = $review->user; ?>
    <li class="media">
        <div class="media-left" style="margin-top:30px;">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div style="margin-top:30px;">
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $review->created_at }}</span>
            </div>
            <div>
            　 <p>{!! nl2br(e($review->title)) !!}</p>
                <p>{!! nl2br(e($review->content)) !!}</p>
            </div>
        <div>
        @if (Auth::id() == $review->user_id)
                    {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $reviews->render() !!}
