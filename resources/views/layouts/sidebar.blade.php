<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    @vite([
        'resources/css/sidebar.css', 
        'resources/css/home.css', 
        'resources/js/app.js',
        'resources/js/main.js',
    
        ])
</head>
<body>
      <!-- Sidebar Start -->
 
    <div class="wrapper  ">
        <!-- Sidebar  -->
        <nav id="sidebar" class="border border-right">
            <div class="sidebar-header">
                {{-- <img class="rounded-circle" src={{asset('storage/img/user.jpg')}} alt="" style="width: 40px; height: 40px;"> --}}
                <div class="mb-0"> 
                  
                    {{auth()->user()->name ?? "Joe Doe"}}
                </div>
                <div class="text-capitalize">
                    <span class="bg-success rounded  rounded-sm px-1">
                        {{auth()->user()->role ??  "-"}}
                    </span> 
                </div>

            </div>

            <ul class="list-unstyled components border-right  ">
                <p>Dummy Heading</p>
                
                <li>
                    <a href={{route('admin.dashboard')}} class="nav-item nav-link text-dark {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas  fa-tachometer-alt me-2"></i>Dashboard</a>
        
                </li>
                <li>
                    <a href={{route('products.index')}} class="nav-item nav-link text-dark {{ request()->routeIs('products.index') ? 'active' : '' }}"><i class="fa fa-solid  fa-list me-2"></i>Products</a>
        
                </li>
                <li>
                    <a href={{route('categories.index')}} class="nav-item nav-link text-dark {{ request()->routeIs('categories.index') ? 'active' : '' }}"><i class="fa fa-solid  fa-list-ol me-2"></i>Categories</a>
        
                </li>
                <li>
                    <a href={{route('contacts.index')}} class="nav-item nav-link text-dark {{ request()->routeIs('contacts.index') ? 'active' : '' }}"><i class="fas fa-solid fa-address-book me-2"></i>Contacts</a>
        
                </li>
                <li>
                    <a href={{route('subscribers.index')}} class="nav-item nav-link text-dark {{ request()->routeIs('subscribers.index') ? 'active' : '' }}"><i class="fas fa-solid fa-thumbs-up me-2"></i>Subscribers</a>
        
                </li>
            
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

                <nav class="navbar navbar-expand-lg shadow-none navbar-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                            <span>Toggle Sidebar</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>

                        
                    </div>
                </nav>
                {{-- content --}}
                <div>
                    @yield('content')
                </div>
        </div>
    </div>

 

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>
</html>