<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container">
  <div class="navbar-header">
<a class="navbar-brand" href="/"><img src="{{ secure_asset("images/DOKUSHOKA.png") }}" alt="Dokushoka"></a>
  
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSuportedContents" aria-controls="navbarSuportedContents" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
  
   <div class="collapse navbar-collapse" id="navbarSuportedContents">
    <ul class="nav navbar-nav ml-auto">
         @if (Auth::check())
      <li class="nav-item active">
        <a class="nav-link nav-book" href="{{ route('books.create') }}">
         <span class="fa fa-plus" aria-hidden="true"></span>
         BOOKを追加
        </a>        
      </li>
      
      <li class="nav-item active">
                        <a class="nav-link nav-book" href="{{ route('ranking.want') }}"  role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="fa fa-signal" aria-hidden="true"></span>
                                ランキング
                         </a>
                        </li>
      
<li class="nav-item active dropdown">
<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <span class="gravatar">
    <img src="{{ Gravatar::src(Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
    </span>
     {{ Auth::user()->name }}
    <span class="caret"></span>
  </a>
  
  
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">マイページ</button>
    <li role="separator" class="divider"></li>
    
    <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
    </form>
  </ul>
</li>
        
         @else
            <li><a class="nav-link" href="{{ route('register') }}">新規登録</a></li>
            <li><a class="nav-link" href="{{ route('login') }}">ログイン</a></li>
         @endif
      
    </ul>
  </div>
  </div>
</nav>
</header>