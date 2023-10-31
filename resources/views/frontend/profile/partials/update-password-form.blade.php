@extends('frontend.index')
@section('title','Home')
@section('content')

<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>Profile Update</p>
</div>
<div class="container">
    <div class="row pt-5">
        <h2 class="text-lg font-medium text-gray-900">
            Update Password
        </h2>
    
        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>

    </div>
    <form method="post" action="{{ route('password.update') }}" >
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <div class="pt-4">
                    <x-input-label for="current_password" :value="__('Current Password')" />
                    <br>
                    <input  name="current_password" class="password-update" type="password"  autocomplete="current-password" />
                    {{-- <x-input-error :messages="$errors->updatePassword->get('current_password')"  /> --}}
                </div>
                <div class="pt-4">
                    <label for="">PassWord</label>
                    <br>
                    <input id="password" class="password-update" name="password" type="password"  autocomplete="new-password" />
                    {{-- <x-input-error :messages="$errors->updatePassword->get('password')"  /> --}}
                </div>
                <div class="pt-4">
                    <label > Confirm Password</label>
                    <br>
                    <input id="password_confirmation" class="password-update" name="password_confirmation" type="password"  autocomplete="new-password" />
                    {{-- <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"  /> --}}
                </div>
                <div class="pt-5 submit-password-update">
                    <button type="submit">Submit</button>
                </div>
            </div>

        
        </div>
    </form>

</div>
@endsection