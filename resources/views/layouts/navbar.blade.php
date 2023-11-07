<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">

    @vite([
    'resources/css/home.css', 
    'resources/js/app.js',
    'resources/js/main.js',

    ])
</head>
<body>

    <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="{{url('/')}}"><span class="fw-bold text-uppercase text-dark">Boutique</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <img src="{{asset('storage/img/shopping.png')}}" width="25px" style="object-fit: cover; object-position: left;"alt="">

                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} mx-2" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">Shop</a>
                </li>
               
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown">
                      <a class="dropdown-item border-0 transition-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}" >Shop</a>
                      <a class="dropdown-item border-0 transition-link {{ request()->routeIs('cart') ? 'active' : '' }} " href="{{ route('cart') }}" >Cart</a>
                  </div>
                </li>
                <li class="nav-item">
                    <!-- Link--><a class="nav-link mx-0 mx-md-2  {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                  </li>
              </ul>
              <ul class="navbar-nav ms-auto">               
                <li class="nav-item">
                  <a class="nav-link" href="{{route('cart')}}"> 
                  <i class="fas fa-dolly-flatbed me-1 text-gray"></i>
                  Cart<small class="text-gray fw-normal">( {{ session('cartCount',0)  }})</small>
                  </a>
              </li>
              {{-- 
                                <li class="nav-item"><a class="nav-link" href="#!"> <i class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>    
              --}}
              @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                 
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
         
              <li class="nav-item">
                 @auth
                  @if (Auth::user()->isAdmin())
                      <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                  @elseif(Auth::user()->isEditor())
                      <a class="nav-link" href="{{ route('editor.dashboard') }}">{{ __('Dashboard') }}</a>
                  @else
                   

                  @endif
                 @endauth
             
              </li>
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <i class="fas fa-user me-1 text-gray fw-normal"></i>   {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
                  
              </li>
             
            @endguest
               
              </ul>
            </div>
          </nav>
        </div>
      </header>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</body>
</html>