@extends('base')

  
@section('title','Subscribers')

@section('content')
<div class="container ">
    <div class="row ">
      
        <div class="col-10 ">
          
            <div class="container  p-3  " >
                <h3>Subscribers</h3>
               
                    <form method="get" action={{route('subscribers.search')}}>
                    
                     
                       <div class="d-flex justify-content-end  mb-3">
                        <input type="text" name="search" class="form-control w-25  shadow-none" id="">
                        <button class="btn btn-sm px-1 rounded-none btn-secondary">
                         Search Subscriber
                       </button> 
                       </div>
                     
                    </form>
               
                <table class="table table-bordered  mb-0 w-100"  >
                  <thead class="">
                    <tr>
                      <th>#</th>
                      <th>Subscriber</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($subscribers as $subscriber)
                    
                      <tr>
                        <td>
                          <p class="fw-normal text-muted mb-1">{{$subscriber->id}}</p>
                        
                          </td>
                         
                          <td>
                          <p class="fw-normal text-muted mb-1">{{$subscriber->email}}</p>
                        
                          </td>
                         
                        
                          <td>
                              <div class="d-flex justify-content-center">
                               
                               <form method="post" action={{route('subscribers.destroy',$subscriber->id)}} >
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
                            No subscribers
                          </h2>
                   
                        </td>
                       </tr>
                    @endforelse
                  
                  </tbody>
                </table>
            </div>
                {{$subscribers->links()}}
        </div>
         
    </div>
</div>

@endsection
