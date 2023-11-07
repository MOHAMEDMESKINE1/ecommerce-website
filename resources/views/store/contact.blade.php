<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
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

    <div class="container my-5">
      
        <x-section-store 
        title="Contact Us "
         linkText='Home'
         linkUrl='/'>
        </x-section-store>
    </div>
    <section class="m-0 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="ratio ratio-1x1">
                        <iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55083.30714676692!2d-9.5919589084946!3d30.359284553077988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3c7dc560ea42d%3A0xbd9dec76dd67bfaa!2sInezgane%2080000!5e0!3m2!1sen!2sma!4v1699286343069!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
    
    
                </div>
                <div class="col-md-6 mt-5 mt-lg-0">
                    
                    <form action="{{route('contacts.store')}}" method="post">
                        @csrf
                        <div class="d-flex justify-contact-start">
                        <h1>CONTACT US</h1>
    
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" 
                             class="form-control w-100 @error('name') is-invalid @enderror"
                             value="{{ old('name') }}"
                             >
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" 
                             class="form-control w-100 @error('email') is-invalid @enderror"
                             value="{{ old('email') }}"
                             >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">City</label>
                            <input type="text" name="city" 
                             class="form-control w-100 @error('city') is-invalid @enderror"
                             value="{{ old('city') }}"
                             >
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="text" name="phone" 
                             class="form-control w-100 @error('phone') is-invalid @enderror"
                             value="{{ old('phone') }}"
                             >
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
        
                            @enderror
                          </div>
                          <div class="mb-3">
                          
                            <input type="submit"  class="btn btn-primary text-white w-100" value="Contact Us" >
                            
                          </div>
                          
                    </form>
    
                </div>
                
            </div>
        
        </section>
            
        </div>
        </div>

        @include('layouts.footerStore')

</body>
</html>