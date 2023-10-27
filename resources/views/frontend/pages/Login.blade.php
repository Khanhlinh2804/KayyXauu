@extends('frontend.index')
@section('title','Home')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/9.png" alt="">
    <p>Login</p>
</div>
<div class="container">
    <div class="row pt-5 pb-5">
        @if (session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
            @elseif(session('error'))       
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{ session('error') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div>
                    <h2 class="text-center">Login</h2>
                    <p class="text-center">
                        Welcome back
                    </p>
                </div>
                <div class="form-group contact" >
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group contact" >
                    <input type="password" name="password" class="form-control" placeholder="password">
                    @error('phone')
                    <p class="text-danger">{{ $messages }}</p>
                    @enderror
                </div>
                <div class="pt-5">
                    <button type="submit" class="contact-submit">Login</button>
                </div>
            </form>
            <div class="pt-2">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                {{-- <a href="{{route('signup')}}" class="link-offset-2 link-underline link-underline-opacity-0">Do you have an account ?</a> --}}
            </div>
            <div class="pt-2"></div>
            <div class="row pt-4">
                <div class="col-lg-5">
                    <hr>
                </div>
                <div class="col-lg-2">
                    <p class="text-center">OR</p>
                </div>
                <div class="col-lg-5">
                    <hr>
                </div>

            </div>
            <div class="pt-3"></div>
            <button type="submit" class="login-button">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 ">
                        <div class="d-flex">
                            <div class="mt-2 ml-3">
                                <i class="fab fa-google" ></i>
                            </div>
                            <p class="p-2">Continue with Google</p>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </button>
            <div class="pt-3"></div>
            <button type="submit" class="login-button">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-7 ">
                        <div class="d-flex">
                            <div class="mt-2">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <p class="p-2">Continue with Facebook</p>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </button>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
@endsection