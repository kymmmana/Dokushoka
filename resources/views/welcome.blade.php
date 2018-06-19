@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>1冊の本が人生を変えてくれた。</h1>
                @if (!Auth::check())
                <a href="{{ route('register') }}" class="btn btn-success btn-lg">DOKUSHOKAを始める</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')
    テスト
@endsection