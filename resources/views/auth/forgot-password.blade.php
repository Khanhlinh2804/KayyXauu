@extends('frontend.index')
@section('title','Home')
@section('content')

<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>Forgot password</p>
</div>
<div class="container">
    <div class="row pb-5">
        <div class="mb-4 text-sm text-gray-600 pt-4">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="col-lg-1"></div>
        <div class="col-lg-9">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="">Email</label>
                    <br>
                    <input id="email" class="password-update" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class=" pt-4 submit-password-update">
                    <button>
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>
    
@endsection
