@extends('frontend.index')
@section('title','Checkout')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/10.png" alt="">
    <p>Success</p>
</div>
<div class="container">
    <div class="row text-center pt-5">
        <h1 class="pb-5">You order successfully</h1>
        <br>
        <div class="pt-4 cart-shop">
            <a href="{{route('shop')}}">
                <i class="fas fa-arrow-left"></i><span class="p-3">Back Shop</span>
            </a>
        </div>
    </div>
</div>
@endsection