{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
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
                <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
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