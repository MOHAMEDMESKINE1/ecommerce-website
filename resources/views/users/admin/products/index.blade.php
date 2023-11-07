{{-- @extends('base') --}}
@extends('base')

  
@section('title','Products')

@section('content')
<div class="container ">
    <div class="row ">
      
        <div class="col-10 ">
          
            <div class="container  p-3  " >
                <h3>Products</h3>
                <div>
                  <a href={{route('products.create')}} name="" id="" class="btn mb-2 btn-primary">Create Product</a>

                </div>
               
                    <form method="post" action={{route('products.search')}}>
                      @csrf 
                     
                       <div class="d-flex justify-content-end  mb-3">
                        <input type="text" name="search" class="form-control w-25  shadow-none" id="">
                        <button class="btn btn-sm px-1 rounded-none btn-secondary">
                         Search Product
                       </button> 
                       </div>
                     
                    </form>
               
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
                          <h4 class="fw-normal badge bg-success mb-1">
                              @if ($product->category)
                                 <a href={{route('categories.show',$product->category_id)}} class=" btn-link text-light "> {{$product->category?->name}}</a>
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
                                <input type="submit" class="btn  btn-danger btn-sm btn-rounded  show_confirm" type="submit" value="Delete"/>
                               
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
                {{$products->links()}}
        </div>
         
    </div>
</div>
@endsection
@push('scripts')
<script>
   
   $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>
@endpush 

