 {{-- @extends('base')
  
@section('content')


@endsection --}}
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
 @include('layouts.navbar')
<div class="container  ">
    <div class="row mx-auto" >
      
        <div class="col-md-10 mx-auto">

            <div class="container mx-auto p-5 ">
                <h1>hello editor</h1>
            </div>
         
        </div>
         
    </div>
</div>
</body>
</html>