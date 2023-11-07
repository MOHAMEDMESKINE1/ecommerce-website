{{-- @extends('base') --}}
@extends('base')

  
@section('title','categories')

@section('content')

<div class="container  ">
    <div class="row  "  >
      
        <div class="col-10" >
          
            <div class="container  p-3  " >
                <h3>Categories</h3>
                <div>
                  <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add">
                    Create 
                  </button>
                </div>
               
                    <form method="post" action={{route('categories.search')}}>
                      @csrf 
                     
                       <div class="d-flex justify-content-end  mb-3">
                        <input type="text" name="search" class="form-control w-25  shadow-none" id="">
                        <button class="btn btn-sm px-1 rounded-none btn-secondary">
                         Search Category
                       </button> 
                       </div>
                     
                    </form>
               
                <table class="table table-bordered  mb-0 w-100"  >
                  <thead class="">
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categories as $category)
                    
                      <tr>
                          <td>
                            <p class="fw-normal text-muted mb-1">{{$category->id}}</p>
                        
                          </td>
                          <td>
                            <p class="fw-normal text-muted mb-1">{{$category->name}}</p>
                        
                          </td>                        
                          <td>
                              <div class="d-flex justify-content-center">
                                
                              
                                  <a  href={{route('categories.show',$category->id)}} class="btn   btn-success btn-sm btn-rounded">
                                    Show
                                  </a>
                                  <a  href={{route('categories.edit',$category->id)}} class="btn mx-2  btn-primary btn-sm btn-rounded">
                                    Edit
                                  </a>
                                  <form method="post" class="form-delete" action={{route('categories.destroy',$category->id)}} >
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn  btn-danger btn-sm btn-rounded show_confirm"  value="Delete"/>
                                  
                                  </form>
                              </div>
                          </td>
                      </tr>
                    @empty
                       <tr>
                        <td>
                          <h2 class="text-primary">
                            No categories
                          </h2>
                   
                        </td>
                       </tr>
                    @endforelse
                  
                  </tbody>
                </table>
            </div>
                {{$categories->links()}}
        </div>
         
    </div>
</div>
<div class="modal fade" id="add" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action={{route('categories.store')}} enctype="multipart/form-data">
          @csrf
         <div class="row mb-3">
             <label for="name" class="col-sm-2 col-form-label">Name</label>
             <div class="col-sm-10">
                 <input type="text" name="name" class="form-control" id="name">
             </div>
         </div>
                 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>


@push('scripts')
<script>
    const myModal = new bootstrap.Modal(document.getElementById('add'), options)

   $('.show_confirm').click(function(event) {
          var form =  $(this).closest(".form-delete").find('form');
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

@endsection
