@extends('frontend.index')
@section('title','Home')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>Profile</p>
</div>
<div class="container">
    <div class="row pt-5">
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
        <div class="col-lg-5">
                <h1>Hello {{Auth::user()->name}}</h1>
    </div>
    <div class="row pt-5">
        <h1 class="pb-5">Order</h1>
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th></th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>TotlePrice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail->order_detail as $item)  
                        @php
                            $total = 0;
                        @endphp
                        @php
                            $total += $item->quantity * $item->price;
                        @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->products->name}}</td>
                            <td>
                                <img src="{{url('uploads')}}/{{$item->products->images}}" alt="" width="150px" height="170px">
                            </td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}$</td>
                            <td>{{$total}}</td>    
                        </tr>
                        @php
                            $totalPrice = 0
                        @endphp
                        @php
                            $totalquantity = 0
                        @endphp
                        @php
                            $totalPrice += $total;
                            $totalquantity += $item->quantity
                        @endphp

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row pb-5 pt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <h3>Total</h3>
            <table class="table">
                <tbody>
                    
                    <tr>
                        <td>Total Price</td>
                        <td style="color: rgb(229, 4, 4);">$ {{$totalPrice}}</td>
                    </tr>
                    <tr>
                        <td>Total Quantity</td>
                        <td style="color: rgb(229, 4, 4);"> {{$totalquantity}} </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pt-4 cart-shop">
                        <a href="{{route('profile.index')}}">
                            <i class="fas fa-arrow-left"></i><span class="p-3">Back Profile</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-4">
                    <div class=" pt-1 cart-checkout text-center ">
                        <a href="{{route('shop')}}" class=" text-center pb-2">
                            Continue shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection