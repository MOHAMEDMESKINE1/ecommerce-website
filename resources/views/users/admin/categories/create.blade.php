@extends('base')

  
@section('title','Create')

@section('content')
<div class="container m-5">
    <div class="row mx-auto">
        <div class="col-md-10 mx-auto">
            <div class="bg-white rounded h-100 shadow-sm p-4">
                <h4 class="mb-4">Create  Product</h4>
                <form method="POST" action={{route('categories.store')}} enctype="multipart/form-data">
                     @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                    </div>
                    
                    
                    
                    <button type="submit" class="btn btn-primary">Add Catgeory</button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection