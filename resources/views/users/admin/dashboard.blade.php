 @extends('base')
  
@section('content')

    <div class="container ">
        
        <div class="row gap-2">
            <div class="col-12 col-md-12">
                <div class="card" >
                    <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            
                            {!! $products_pie->container() !!}
            
                        </div>
                </div>
        
            </div>

            <div class="col-12  col-md-12">
                <div class="card" >
                    <div class="card-header">Dashboard</div>
                        <div class="card-body">
            
                          
                            {!! $products_bar->container() !!}
            
                        </div>
                </div>
        
            </div>
            
           <div class="col-12  col-md-12">
            <div class="card" >
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
        
                      
                        {!! $products_line->container() !!}
        
                    </div>
            </div>
           </div>
           <div class="col-12  col-md-12">
            <div class="card" >
                <div class="card-header">Dashboard</div>
                    <div class="card-body">
        
                      
                        {!! $products_area->container() !!}
        
                    </div>
            </div>
           </div>
    
            
            
        </div>
       
    </div>


@endsection 

@push('scripts')
<script src="{{ $products_pie->cdn() }}"></script>
{{-- <script src="{{ $products_bar->cdn() }}"></script> --}}


{{ $products_pie->script() }}
{{ $products_bar->script() }}
{{ $products_line->script() }}
{{ $products_area->script() }}

@endpush

