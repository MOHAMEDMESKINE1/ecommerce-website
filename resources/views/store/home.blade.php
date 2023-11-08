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
<body class="bg-white">
    <div class="page-holder">
        <!-- navbar-->
        @include('layouts.navbar')
       
        <!-- HERO SECTION-->
        <div class="container">
          <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{asset('storage/img/hero-banner-alt.jpg')}})">
            <div class="container py-5">
              <div class="row px-4 px-lg-5">
                <div class="col-lg-6">
                  <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                  <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="{{url('/shop')}}">Browse collections</a>
                </div>
              </div>
            </div>
          </section>
        
          <!-- TRENDING PRODUCTS-->
          <section class="py-5">
            <header>
              <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
              <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
            </header>
            <div class="row">
              <!-- PRODUCT-->
             
                @foreach ($products as $product)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product text-center">
                        <div class="position-relative mb-3">
                        <div class="badge text-white bg-"></div><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="{{asset('storage/'.$product->image)}}" alt="..."></a>
                        <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{ url('add-to-cart/'.$product->id) }}">Add to cart</a></li>
                        </div>
                        </div>
                        <h6> <a class="reset-anchor" href="detail.html">{{$product->name}}</a></h6>
                        <p class="small text-muted">$ {{$product->price}} </p>
                    </div>
                </div>
                @endforeach
             
              <!-- PRODUCT-->
            
            </div>
          </section>
          <!-- SERVICES-->
          <section class="py-5 bg-light">
            <div class="container">
              <div class="row text-center gy-3">
                <div class="col-lg-4">
                  <div class="d-inline-block">
                    <div class="d-flex align-items-end">
                      <svg class="svg-icon svg-icon-big svg-icon-light">
                        <use xlink:href="#delivery-time-1"> </use>
                      </svg>
                      <div class="text-start ms-3">
                        <h6 class="text-uppercase mb-1">Free shipping</h6>
                        <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-inline-block">
                    <div class="d-flex align-items-end">
                      <svg class="svg-icon svg-icon-big svg-icon-light">
                        <use xlink:href="#helpline-24h-1"> </use>
                      </svg>
                      <div class="text-start ms-3">
                        <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                        <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="d-inline-block">
                    <div class="d-flex align-items-end">
                      <svg class="svg-icon svg-icon-big svg-icon-light">
                        <use xlink:href="#label-tag-1"> </use>
                      </svg>
                      <div class="text-start ms-3">
                        <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                        <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- NEWSLETTER-->
          <section class="py-5">
            <div class="container p-0">
              <div class="row gy-3">
                <div class="col-lg-6">
                  <h5 class="text-uppercase">Let's be friends!</h5>
                  <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
                </div>
                <div class="col-lg-6">
                  <form action="{{route('subscribers.store')}}" method="POST">
                     @csrf
                    <div class="input-group">
                      <input type="text" name="email" 
                      class="form-control w-75 @error('email') is-invalid @enderror"
                      value="{{ old('email') }}"
                      >
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
 
                     @enderror
                      
                      <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
         <!-- FOOTER-->
       @include('layouts.footerStore')
        <!-- JavaScript files-->
        <script>
        
          function injectSvgSprite(path) {
          
              var ajax = new XMLHttpRequest();
              ajax.open("GET", path, true);
              ajax.send();
              ajax.onload = function(e) {
              var div = document.createElement("div");
              div.className = 'd-none';
              div.innerHTML = ajax.responseText;
              document.body.insertBefore(div, document.body.childNodes[0]);
              }
          }
          // this is set to BootstrapTemple website as you cannot 
          // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
          // while using file:// protocol
          // pls don't forget to change to your domain :)
          injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
          
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      </div>
</body>
</html>