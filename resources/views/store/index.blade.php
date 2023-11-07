<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite([
        
        'resources/css/style.css', 
        'resources/sass/bootstrap.scss', 
        'resources/js/app.js',
       
        ])
</head>
<body>
    @php
        $categoriesIds=Request::input('categories',[]);
        $max = Request::input('max');
        $min = Request::input('min');
    @endphp
    @include('layouts.navbar')
    
    <div class="container mt-5 mb-5">
       <div class="row">
            <div class="col-12  col-md-3 mb-2 m-lg-0">
               
                <ul class="list-group  ">
                    <li   class="list-group-item disabled d-flex justify-content-between align-items-center active">
                        Filters
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <form  method="get">

                            <div class="mb-2">

                                <label for="name" class="form-label">Product</label>
                                <input type="text" name="name" id="name" value="{{$value}}" class="form-control" placeholder="" aria-describedby="helpId">
                            </div> 
                            <hr class="text-secondary">
                            <div class="mb-2">

                                <label for="name" class="form-label">Categories</label><br>
                               
                                @foreach ($categories as $category)
                                     <ul>
                                        <li class="fw-bold"> <input type="checkbox" @checked(in_array($category->id,$categoriesIds)) name="categories[]" value="{{$category->id}}" class="form-control-checkbox mx-2" id=""> {{$category->name}} </li>
                                     </ul>
                                @endforeach
                            </div> 
                            <hr class="text-secondary">
                            <label for="name" class="form-label">Price</label><br>

                            <div class="mb-2">
                                <label for="min" class="form-label">Min : </label><br>
                                <input type="number" min="{{$priceOptions->minPrice}}" max="{{$priceOptions->maxPrice}}" name="min" id="min" value="{{$min}}"   class="form-control" placeholder="">
                            </div> 

                            <div class="mb-2">
                                <label for="max" class="form-label">Max : </label><br>
                                <input type="number" min="{{$priceOptions->minPrice}}" max="{{$priceOptions->maxPrice}}" name="max"  id="max" value="{{$max}}" class="form-control" placeholder="">
                            </div> 

                            <hr class="text-secondary">
                            <div class="mb-2">
                                <input type="submit" class="btn btn-success " class="" class="text-muted" value="Filter"/>
                                <a type="reset" class="btn btn-secondary " class="text-muted" value="Reset"  href="{{route('index')}}">Reset</a>
                            </div>
                             
                        </form>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-9 ">
               
                    @foreach ($products as $product)
                    <div class="col-md-12 ">
                        <div class="row p-2 bg-white border  rounded  mb-2 ">
                            <div class="col-md-3 mt-1"><img class="img-fluid card-img-top img-responsive  rounded product-image" src={{asset('storage/'.$product->image)}} ></div>
                            <div class="col-md-6 mt-1">
                                <h5>{{$product->name}}</h5>                           
                                <div class="mt-1 badge bg-success mb-1 spec-1"><span>Quantity : {{$product->quantity}} </span><span class="dot"></div>
                                <div class="mt-1 badge bg-info mb-1 spec-1">
                                    <span>
                                        Category : @if ($product->category)
                                                {{$product->category?->name}}
                                            @else 
                                            -
                                            @endif
                                    </span>
                                    <span class="dot"></div>
                                <p class="text-justify text-truncate text-primary para mb-0">{!!$product->description !!}<br><br></p>
                                <p class="text-justify text-truncate para mb-0"> last Updated : {{$product->updated_at  }}<br><br></p>

                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">${{$product->price}}</h4>
                                </div>
                                <h6 class="text-success">Free shipping</h6>
                                <div class="d-flex flex-column mt-4">
                                    {{-- <button class="btn btn-secondary btn-sm" type="button">Details</button> --}}
                                    <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-outline-primary btn-sm mt-2" >Add To Cart</a></div>

                            </div>

                        </div>
                    </div>
        
                    @endforeach
                    
              
            </div>
       
       </div>
        
        
    </div>
    @include('layouts.footerStore')
</body>
</html>