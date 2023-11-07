 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite([
        'resources/sass/app.scss', 
        'resources/css/style.css', 
        'resources/sass/bootstrap.scss', 
        'resources/js/app.js',
        'resources/lib/charts/chart.js',
        'resources/lib/charts/chart.js',
        'resources/lib/charts/easing.js',
        'resources/js/main.js',

        ])
 </head>
 <body>
     <!-- Sidebar Start -->
  <div class="sidebar  pb-3 border-end">
    <nav class="navbar bg-light navbar-light mx-2">
        <a href={{route('index')}} class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i> Ecommerce</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src={{asset('storage/img/user.jpg')}} alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{auth()->user()->name ?? "Joe Doe"}}</h6>
                <span class="text-capitalize">{{auth()->user()->role ??  "-"}}</span>
            </div>
        </div>
        <div class="navbar-nav ">
            <a href={{url('products/statistics')}} class="nav-item nav-link {{ request()->routeIs('products.statistics') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Statistics</a>
            <a href={{route('categories.index')}} class="nav-item nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Categories</a>
         
            </div>

        </div>
    </nav>
   
 </div> 

<!-- Sidebar End -->

    
 </body>
 </html>