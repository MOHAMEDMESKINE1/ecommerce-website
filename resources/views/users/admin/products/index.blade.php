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
                    {{-- <button class="btn btn-danger" id="multi-delete" data-route="{{route('products.multiDelete') }}">Delete All Selected</button> --}}
                <table class="table table-bordered  mb-0 w-100" id="products-table" >
                  <thead class="">
                    <tr>
                      {{-- <th width="50px"><input type="checkbox" class="check-all"></th> --}}
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
                            {{-- <td>
                              <input type="checkbox" class="check" value="{{ $product->id }}">
                            </td> --}}
                            <td>
                              <p class="fw-normal text-muted mb-1">{{$product->id}}</p>
                            
                              </td>
                              <td>
                                <div class="d-flex align-items-center" >
                                    @if ($product->image)
                                      <img
                                          src="{{asset('storage/'.$product->image)}}"
                                          alt=""
                                          style="width: 45px; height: 45px"
                                          class=""
                                      />
                                    @else
                                    @endif
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
              title: `Are you sure you want to delete this product?`,
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

<script type="text/javascript">

  $(document).ready(function() {

    // $("#products-table").TableCheckAll();

    $('#multi-delete').on('click', function() {
      var button = $(this);
      var selected = [];
      $('#products-table .check:checked').each(function() {
        selected.push($(this).val());
      });

      Swal.fire({
        icon: 'warning',
          title: 'Are you sure you want to delete selected record(s)?',
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: 'Yes'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            type: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: button.data('route'),
            data: {
              'selected': selected
            },
            success: function (response, textStatus, xhr) {
              Swal.fire({
                icon: 'success',
                  title: response,
                  showDenyButton: false,
                  showCancelButton: false,
                  confirmButtonText: 'Yes'
              }).then((result) => {
                window.location='/products'
              });
            }
          });
        }
      });
    });
  
  });
</script>

@endpush 

