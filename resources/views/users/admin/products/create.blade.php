@extends('base')

  
@section('title','Create')

@section('content')
<div class="container m-5">
    <div class="row mx-auto">
        <div class="col-md-10 mx-auto">
            <div class="bg-white rounded h-100 shadow-sm p-4">
                <h4 class="mb-4">Create  Product</h4>
                <form method="POST" action={{route('products.store')}} enctype="multipart/form-data">
                     @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="description">{{old('description')}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" name="quantity"  value="{{old('quantity')}}" class="form-control" id="quantity">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="number" name="price" value="{{old('price')}}" class="form-control" id="price">
                        </div>
                    </div>
                   <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label">Categories</label>

                    <div class="col-sm-10">

                        <select class="form-select form-select" name="category_id" id="category">
                            <option selected disabled>Please choose a category</option>
                            @foreach ($categories as $category)
                                 <option value={{$category->id}} >{{$category->name}}</option>
                                
                            @endforeach
                            
                         </select>
                     </div>
                   </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection