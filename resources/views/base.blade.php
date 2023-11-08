<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <title>@yield('title') || {{config('app.name')}}</title>
 <!-- Scripts -->
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        {{-- chartjs --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="plugins/Jquery-Table-Check-All/dist/TableCheckAll.js"></script>
        @vite([
        'resources/sass/app.scss', 
        'resources/css/style.css', 
        'resources/css/home.css', 
        'resources/sass/bootstrap.scss', 
        'resources/js/app.js',
        'resources/lib/charts/chart.js',
        'resources/lib/charts/chart.js',
        'resources/lib/charts/easing.js',
        'resources/js/main.js',

        ])
</head>
<body>
    @include('layouts.navbar')
      <!-- SideBar--->
  
      @include('layouts.sidebar')
  
      <!-- SideBar--->
  
      {{--display errors --}}
    
      {{-- display errors --}}
      <div class="container mx-auto w-75 m-5" style="margin-left: 250px !important;">
          @if ($errors->any())
          
          <div class="alert alert-danger" role="alert">
            <strong>Errors</strong> 
            <!-- Hover added -->
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                        <li  class="list-group-item list-group-item-action ">{{$error}}</li>
                @endforeach
            </ul>
          </div>
          
              
        
          @endif
      </div>
    @stack('scripts')
</body>
</html>