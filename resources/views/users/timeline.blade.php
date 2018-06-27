@extends('layouts.app')


@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="status text-center">
                        <ul class="nav nav-tabs">
            <li class="nav-item">
    <a class="nav-link active {{ Request::is('users/' . $user->id) ? 'active' : '' }}" href="{{ route('users.show', ['id' => $user->id]) }}">Love {{ $count_want }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled {{ Request::is('users/*/timeline' . $user->id) ? 'active' : '' }}" href="{{ route('users.timeline', ['id' => $user->id]) }}" >Timeline{{ $count_reviews }}</a>
  </li>
</ul>

           
        </div>
    </div>
   
    
    <div class="row">
         <div class="card col-xs-8" style="margin-top:50px; padding-top:50px;">
             
         
           
           
            @if (count($reviews) > 0)
                @include('reviews.reviews', ['reviews' => $reviews])
            @endif
        </div>
    </div>
@endsection
