@extends('base')

  
@section('title','Edit Category')

@section('content')
<div class="container ">
    <div class="row ">
        <div class="col-md-10 ">
            <div class="bg-white rounded h-100 border border-sm p-4">
                <x-go-back></x-go-back>
                <h4 class="mb-4">@yield('title')</h4>
              

                <form method="POST" action={{route('categories.update',$category->id)}} enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{old('name',$category->name)}}" class="form-control" id="name">
                        </div>
                    </div>
                    
                    
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection