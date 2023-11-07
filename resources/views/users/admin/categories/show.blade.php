@extends('base')

  

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10 ">
           
            <div class="bg-white rounded h-100 border border-sm p-4">
                <x-go-back></x-go-back>

                  <h1 class="mb-4">{{$category->name}}</h1>
                  <table class="table table-bordered  mb-0 w-100"  >
                    <thead class="">
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($products as $product)
                      
                        <tr>
                          <td>
                            <p class="fw-normal text-muted mb-1">{{$product->id}}</p>
                          
                            </td>
                            <td>
                              <div class="d-flex align-items-center" >
                                  <img
                                      src="{{asset('storage/'.$product->image)}}"
                                      alt=""
                                      style="width: 45px; height: 45px"
                                      class=""
                                      />
                                  <div class="ms-3">
                                  <p class="fw-bold mb-1">{{$product->name}}</p>
                                 
                                  </div>
                              </div>
                            </td>
                            <td>
                            <p class="fw-normal text-muted mb-1">{{$product->description}}</p>
                          
                            </td>
                            <td>
                            <p class="fw-normal text-muted mb-1">{{$product->quantity}}</p>
                            </td>
                            <td>
                            <h4 class="fw-normal badge bg-secondary mb-1">
                                @if ($product->category)
                                    {{$product->category?->name}}
                                @else 
                                -
                                @endif
                            </h4>
                            </td>
                            <td>
                            <span class="fw-normal text-muted mb-1">{{$product->price}}</span>
                            </td>
                          
                            <td>
                                <div class="d-flex justify-content-center">
                                 
                                    <a  href={{route('products.edit',$product->id)}} class="btn mx-2  btn-primary btn-sm btn-rounded">
                                      Edit
                                    </a>
                                    <form method="post" action={{route('products.destroy',$product->id)}} >
                                      @csrf
                                      @method("DELETE")
                                      <input type="submit" class="btn  btn-danger btn-sm btn-rounded" type="submit" value="Delete"/>
                                    
                                    </form>
                                
                                  
                                 

                                
                                </div>
                            </td>
                        </tr>
                      @empty
                         <tr>
                          <td>
                            <h2 class="text-primary">
                              No Products
                            </h2>
                     
                          </td>
                         </tr>
                      @endforelse
                    
                    </tbody>
                  </table>
              
            </div>
        </div>
    </div>
</div>
@endsection