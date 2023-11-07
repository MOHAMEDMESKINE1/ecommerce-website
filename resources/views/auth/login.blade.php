@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row ">
      
        <div class="col-md-8 ">
            <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>

                            @enderror

                            @if (Route::has('password.request'))
                            <a class="btn btn-link mx-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
    
                            @endif
                        </div>
                       
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 my-2">
                                {{ __('Login') }}
                            </button>

                           
                            <div class="d-flex flex-items-center justify-content-end">
                                <a class="btn" href="{{ route('auth.github') }}"
                                    style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                                    <i class="fas fa fa-brands fa-github fs-3 mx-2"></i> Login with Github
                                </a>
                            </div>
                            <div class="d-flex items-center my-2">
                                <a href="{{ url('auth/google') }}" class=" border border-dark  text-dark"   style=" padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px;">
                                    <img src="{{asset('storage/img/google.png')}}" style="width:25px;" class="mx-2"  >Login with Google
                                </a>
                            </div>
                            <div class="d-flex items-center my-2">
                                <a class="ml-1 border border-dark  text-dark " href="{{ url('auth/facebook') }}" style="padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; " id="btn-fblogin">
                                    <i class="fa fa-facebook-square fs-2 mx-2" aria-hidden="true"></i> Login with Facebook
                                </a>
                            </div>

                           
                        </div>
                    </div>

                    
                </form>
                
            </div>
        </div>
        <div class="col-md-4">
           
            <picture>
              
                <img src="{{asset('storage/img/login.svg')}}" class="w-100 h-100"
                    alt="Login image" >
                
                
            </picture>
           
        </div>
    </div>
</div> --}}
<section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
           
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
  
            <form style="width: 23rem;" method="POST" action="{{ route('login') }}">
                @csrf
              <h3 class="fw-normal text-primary mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                {{-- email --}}
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example18">Email address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- password --}}
              <div class="form-outline mb-1">
                <label class="form-label" for="form2Example28">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                @enderror

                @if (Route::has('password.request'))
                <a class="btn btn-link mx-0" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>

                @endif
                
              </div>
              <div class="form-outline mb-2">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
  
              </div>
             
            <div class="pt-1 mb-2">
                <button type="submit" class="btn btn-primary w-100 mt-2">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="d-flex flex-items-center justify-content-end">
                <a class="btn" href="{{ route('auth.github') }}"
                    style="background: black; padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; color: #ffffff;">
                    <img src="{{asset('storage/img/github.png')}}" style="width:25px;" class="mx-2"  >Login with Github
                </a>
            </div>
            <div class="d-flex items-center my-2">
                <a href="{{ url('auth/google') }}" class=" border border-dark  text-dark"   style=" padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px;">
                    <img src="{{asset('storage/img/google.png')}}" style="width:25px;" class="mx-2"  >Login with Google
                </a>
            </div>
            <div class="d-flex items-center my-2">
                <a class="ml-1 border border-dark  text-dark " href="{{ url('auth/facebook') }}" style="padding: 10px; width: 100%; text-align: center; display: block; border-radius:4px; " id="btn-fblogin">
                    <img src="{{asset('storage/img/facebook.png')}}" style="width:25px;" class="mx-2"  >Login with Facebook
                 
                </a>
            </div>
            
              <p>Don't have an account? <a href="{{route('register')}}" class="link-info">Register here</a></p>
  
            </form>
  
          </div>
  
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block mt-5">
          <img src="{{asset('/storage/img/login.svg')}}"
            alt="Login image" class="w-100 mt-5" style="object-fit: cover;margin:100px auto; object-position: left;">
        </div>
      </div>
    </div>
</section>
@endsection
