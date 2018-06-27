@extends('layouts.app')

@section('content')
    <div class="row show">
        <div class="col-md-6 ">
         
                <div class="card show-more">
                    
                        <img class= "card-img show-more" src="{{ $book->image_url }}" alt="">
                    
                    <div class="card-footer text-center" style= background-color:white; >
                        <p class="card-title">タイトル: {{ $book->title }}</p>
                        <p class="card-title">作者: {{ $book->author }}</p>
                        <div class="buttons text-center">
                         
                                       <p class="text-center"><a href="{{ $book->url }}" target="_blank">楽天詳細ページへ</a></p>
                        </div>
                    </div>
                </div>
            
        </div>

        <div class="col-md-4">
            <div class="want-users">
                <div class="card">
                    <div class="card-header text-center">
                        あらすじ
                    </div>
                    
                     <div class="card-body text-center">
                        @foreach ($want_users as $user)
                            <P>{{ $book->itemCaption}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="have-users">
                <div class="card">
                    <div class="card-header text-center">
                        Loveしたユーザー
                    </div>
                    <div class="card-body">
                        <div class="card-body text-center">
                        @foreach ($want_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
    <?php $reviews = $book->reviews(); ?>
    
            @include('reviews.reviews')
   
        </div>
    
    </div>
@endsection
