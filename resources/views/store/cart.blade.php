<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title>Document</title>
    @vite([
        
        'resources/css/style.css', 
        'resources/sass/bootstrap.scss', 
        'resources/js/app.js',
       
        ])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

</head>
<body>
    @include('layouts.navbar')
   <div class="container  p-2 my-5 rounded shadow-md">
    <x-section-store 
        title="Cart "
         linkText='Home'
         linkUrl='/'>
        </x-section-store>
    <div class="row mx-auto">
        <div class="col-md-9 ">
            <table id="cart" class="table table-hover table-condensed p-2">
                <thead class="bg-light p-2">
                <tr>
                    <th class="border-0 p-3">Product</th>
                    <th class="border-0 p-3">Price</th>
                    <th class="border-0 p-3">Quantity</th>
                    <th class="border-0 p-3" >Subtotal</th>
                    <th class="border-0 p-3" >Actions</th>
                </tr>
                </thead>
                <tbody>
                    
                <?php $total = 0 ?>
                <!-- by this code session get all product that user chose -->
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
        
                        <?php $total += $details['price'] * $details['quantity'] ?>
        
                        <tr>
                            <td class="ps-0 px-3 border-light">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{asset('storage/'.$details['image'])}}" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="mx-5">{{ $details['name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $details['price'] }}</td>
                            <td data-th="Quantity text-center">
                                <input type="number" min="1"  value="{{ $details['quantity'] }}" class="form-control quantity" />

                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                            <td class="actions" data-th="">
                                <div class="d-flex justify-content-between">

                                    <a href="#" class="btn btn-info btn-sm update-cart mx-2" data-id="{{ $id }}"><i class="fa fa-refresh"></i></a>
                                    <!-- this button is for update card -->
                                    <a href="#" class="btn btn-danger btn-sm remove-from-cart text-white delete show_confirm" data-id="{{ $id }}"><i class="fas fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
        
                </tbody>
                <tfoot>
               
                <tr>
                    <td>
                        
                        <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                        <a href="{{ route('cart.clear') }}"  class="btn btn-dark text-white "><i class="fa fa-angle-left"></i> Clear All</a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td colspan="6" class="hidden-xs text-center text-success fw-bold fs-3"><strong>Total ${{ $total }}</strong></td>
                </tr>
                </tfoot>
               
                </table>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <div class="card ">
                        <div class="card-header  fw-bold p-2">Checkout</div>
                        <div class="card-body">
                            <h4 class="card-title">Total  {{$total}} $ </h4>
                           
                            @if (session('cart'))
                            
                                    <form action="{{route('session')}}"  method="POST">
                                        @csrf
                                        @method("POST")
                                        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
                                        <input type="hidden" name="name" value="{{$details['name']}}">
                                        <input type="hidden" name="total" value="{{$total}}">
                                        <button class="btn btn-success w-100" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                    </form>
                            
                                    
                            @endif
                    </td>
                </tr>
            </tfoot>
    </table>
        </div>
        </div>
        </div>
        </div>
        </div>


                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
    <script type="text/javascript">
        // this function is for update card
                $(".update-cart").click(function (e) {
                   e.preventDefault();
        
                   var ele = $(this);
        
                    $.ajax({
                       url: '{{ url('update-cart') }}',
                       method: "patch",
                       data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.attr("data-id"), 
                            quantity: ele.parents("tr").find(".quantity").val()
                        },
                       success: function (response) {
                           window.location.reload();
                       }
                    });
                });
        
                $(".remove-from-cart").click(function (e) {
                    e.preventDefault();
        
                    var ele = $(this);
                    $('.show_confirm').click(function(event) {
                        var form =  $(this).closest("form");
                        var name = $(this).data("name");
                        event.preventDefault();
                        swal({
                            title: `Are you sure you want to delete this Product?`,
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
</body>
</html>