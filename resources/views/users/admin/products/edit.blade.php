@extends('base')

  
@section('title','Edit Product')

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-10 ">
            <div class="bg-white rounded h-100 border border-sm p-4">
                <h4 class="mb-4">@yield('title')</h4>
                <form method="POST" action={{route('products.update',$product->id)}} enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="description">{{old('description',$product->description)}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" name="quantity" value="{{old('quantity',$product->quantity)}}" class="form-control" id="quantity">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control" id="image">
                            @if ($product->image)
                                <img src="{{asset('storage/'.$product->image)}}"  style="width: 50px; height: 50px"  class="m-2" alt="{{old('name',$product->name)}}" srcset="">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" name="price"  value="{{$product->price}}" class="form-control" id="price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-sm-2 col-form-label">Categories</label>
    
                        <div class="col-sm-10">
    
                            <select class="form-select form-select" name="category_id" id="category">
                                <option selected disabled>Please choose a category</option>
                                @foreach ($categories as $category)
                                     <option @selected(old('category',$product->category_id)=== $category->id) value={{$category->id}}>{{$category->name}}</option>
                                    
                                @endforeach
                                
                             </select>
                        </div>

                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection