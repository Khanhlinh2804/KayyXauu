@extends('frontend.index')
@section('title','Blog')
@section('content')
<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-lg-5 ">
            <img src="{{url('uploads')}}/{{$product->images}}" alt="" width="100%" class="ml-3" height="800px">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
            <h1>{{$product->name}}</h1>
            @if ($product->sale_price==0)
            <p style="color: brown; font-size: 30px">{{$product->price}} $</p>
                
            @else
            <del>{{$product->price}} $</del>
            <p style="color: brown; font-size: 30px">{{$product->sale_price}} $</p>
                
            @endif
            
            <div class="row ">
                <div class="col-lg-2">
                    <p>
                       Category
                    </p>
                </div>
                <div class="col-lg-9">
                    <p>{{$product->category->name}}</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-2">
                    <p>
                       Color
                    </p>
                </div>
                <div class="col-lg-9">
                    <p>
                        @if ($product->color == 1)
                                <span >Pink </span>
                            @elseif($product->color == 2)
                                <span >Blue</span>
                            @elseif($product->color == 3)
                                <span >White</span>
                            @else
                                <span >Black</span>
                                
                            @endif
                    </p>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-2">
                    <p>
                       Available
                    </p>
                </div>
                <div class="col-lg-9">
                    <p>{{$product->quatity}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <h5>Quantity:</h5>
                    
                </div>
                <div class="col-lg-8">
                    <div class="detail-quantity d-flex">
                        <button id="decrease" onclick="handleMinus()">
                            <i class="fas fa-minus" style="color: #ffffff;"></i>
                        </button>
                        <input type="text" id="quatity" value="1">
                        <button id="increase" onclick="handlePlus()">
                            <i class="fas fa-plus" style="color: #ffffff;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row pt-5 pb-4">
                <div class="col-lg-4">
                    <a href="{{route('cart.add',['id'=>$product->id])}}" type="submit" class="contact-submit pt-1" style="padding-left: 25%" >Add to card</a>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <button type="submit" class="detail-product-checkout" >Buy now</button>
                </div>
            </div>
            <hr>
            <div class="row linh">
                <h4>Take care of plant</h4>
                <img src="{{url('')}}/assets/imgs/Group 2781.png" alt="" >
            </div>
            <div class="row">
                <h4>Notification</h4>
                <p>{{$product->summary}}</p>
            </div>

        </div>
    </div>
    <div class="row pt-4">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <h3>Summary detail: </h3>
            <p>{{$product->description}}</p>
        </div>
    </div>
    <div class="row pt-4 pb-5">
        <div class="col-lg-12">
            <h2 class="text-uppercase">Related Products</h2>
            <hr>
            <div class="row">
                @foreach ($random as $item)
                <div class="col-lg-3">
                    <div class="btn" style="">
                        <a href="{{route('product.detail',['id'=>$item->id])}}">
                            <img src="{{url('uploads')}}/{{$item->images}}"
                            class="card-img-top img-product" alt="..." width="100%" height="300px">
                        </a>
                        <div class="card-body">
                            <a href="" class="">
                                <p class="fs-5"> {{$item->name}}</p>
                            </a>
                            <h6 class="text-start"> {{$item->sale_price}} $</h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('frontend.layout.shipment')
</div>
@endsection