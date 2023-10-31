@extends('frontend.index')
@section('title','confirm password')
@section('content')

<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>confirm password</p>
</div>
<div class="container">

    <div class="mb-4 text-sm text-gray-600 pt-4">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
        
                <!-- Password -->
                <div>
                    <label for="">Password</label>
                    <br>
                    <input id="password" class="password-update"
                                    type="password"
                                    name="password"
                                    {{-- style="width: 80%;" --}}
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class="flex justify-end mt-4 submit-password-update">
                    <button class="">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
