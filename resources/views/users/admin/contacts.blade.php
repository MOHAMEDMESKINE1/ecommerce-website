@extends('base')

  
@section('title','Contacts')

@section('content')
<div class="container ">
    <div class="row ">
      
        <div class="col-10 ">
          
            <div class="container  p-3  " >
                <h3>Contacts</h3>
               
                    <form method="get" action={{route('contacts.search')}}>
                    
                     
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
                      <th>Contact</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($contacts as $contact)
                    
                      <tr>
                        <td>
                          <p class="fw-normal text-muted mb-1">{{$contact->id}}</p>
                        
                          </td>
                         
                          <td>
                          <p class="fw-normal text-muted mb-1">{{$contact->email}}</p>
                        
                          </td>
                         
                        
                          <td>
                              <div class="d-flex justify-content-center">
                               
                               <form method="post" action={{route('contacts.destroy',$contact->id)}} >
                                @csrf
                                @method("DELETE")
                                <input type="submit" class="btn remove-contact  btn-danger btn-sm btn-rounded  show_confirm" type="submit" value="Delete"/>
                               
                              </form>
                              </div>
                          </td>
                      </tr>
                    @empty
                       <tr>
                        <td>
                          <h2 class="text-primary">
                            No Contacts
                          </h2>
                   
                        </td>
                       </tr>
                    @endforelse
                  
                  </tbody>
                </table>
            </div>
                {{$contacts->links()}}
        </div>
         
    </div>
</div>

@endsection
@section('scripts')
    <script>
          $(".remove-contact").click(function (e) {
                    e.preventDefault();
        
                    var ele = $(this);
                    $('.show_confirm').click(function(event) {
                        var form =  $(this).closest("form");
                        var name = $(this).data("email");
                        event.preventDefault();
                        swal({
                            title: `Are you sure you want to delete this contact?`,
                            text: "If you delete this, it will be gone forever.",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                    $.ajax({
                                url: '{{ url('remove-from-cart') }}',
                                method: "DELETE",
                                data: {

                                    _token: '{{ csrf_token() }}',
                                    id: ele.attr("data-id")
                                },
                                success: function (response) {
                                    window.location.reload();
                                    
                                }

                            });
                            }
                        });
                    });
                   
                        
                    
                });
    </script>
@endsection