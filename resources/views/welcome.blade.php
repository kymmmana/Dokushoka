@extends('layouts.app')

@section('cover')

    <div class="example">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/shelves.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/book2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/book.jpg" alt="Third slide">
    </div>
  </div>

  <p>1冊の本が人生を変えてくれた。</p>
    @if (!Auth::check())
    <a href="{{ route('register') }}" class="button"><span>DOKUSHOKAを始める</span></a>
    @endif
</div>
  <a class="control carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="control carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span
    class="sr-only">Next</span>
  </a>
</div>
  

    
@endsection

    
@section('content')
<div class=card whole>
<div class= "card-header text-center whole">
        <strong>注目の本</strong>
        </div>
    @include('books.books')
    {!! $books->render() !!}
    </div>
@endsection