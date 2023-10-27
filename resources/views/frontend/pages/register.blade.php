@extends('frontend.index')
@section('title','Register')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/9.png" alt="">
    <p>Register</p>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div>
                {{-- <form action="{{route('register')}}" method="post" enctype="multipart/form-data"> --}}
                    @csrf
                    <h2 class="text-center">Register</h2>
                    <p class="text-center">
                        Create an account for easier shopping, faster payments, and effortless order tracking
                    </p>
                    <div class="form-group contact" >
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group contact" >
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group contact" >
                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                        @error('phone')
                        <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    <div class="form-group contact" >
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                        <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    <div class="form-group contact">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Comfirm Password"
                            class="form-control @error('password_confirmation') is-invalid @enderror rounded-0">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="contact-submit">Register</button>
                    </div>
                </form>
                <div class="pt-4">
                    <p class="text-center">By clicking 'Sign up,' you agree to our Terms of Service and Privacy Policy</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
            
</div>
@endsection