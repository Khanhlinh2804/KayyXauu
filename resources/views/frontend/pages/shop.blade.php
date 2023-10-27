@extends('frontend.index')
@section('title','Shop')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/bn-shop.png" alt="">
    <p>Shop</p>
</div>
<div class="container">
    {{-- ---------alerts----------  --}}
    @if (session('success'))
    <div class="pt-5">
        <div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong> {{ session('success') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @elseif(session('error'))       
        <div class="alert alert-warning alert-dismissible fade show " role="alert">
            <strong> {{ session('error') }}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    </div>
        @endif
    {{-- ------- search -------- --}}
    <div class="row pt-5">
        <div class="col-lg-8">
            <form action=""  method="get">
                {{-- @csrf --}}
                <div class="shop-select d-flex" >
                    <select name="order" id="order">
                            <option value="name-ASC">Name (a - z)</option>
                            <option value="name-DESC">Name (z - a)</option>
                            <option value="price-ASC">Price (low - high)</option>
                            <option value="price-DESC">Price (high - low)</option>
                        </select>
                        <button type="submit" class="btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <form>
                <div class="search">
                    <label class="d-flex">
                        <input type="text" class="search" name="key" placeholder="Search here">
                        <div>
                            <button type="submit" style="" class="btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </label>
                </div>
            </form>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-3">
            <div>
                <h3>Classify</h3>
                    <ul class="shop-ul-li">
                        <li>
                            <a href="{{route('shop')}}">
                                All
                            </a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('shop.category', ['id'=>$category->id]) }}" >
                                {{$category->name}}
                            </a>
                        </li>
                        @endforeach
                        
                    </ul>
            </div>
            <div class="shop-follow">
                <h3>Follow</h3>
                <a href="https://www.facebook.com/klyngg/">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/k.lyyngg/">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <div >
                <h3>Blog</h3>
                @foreach ($blog as $item)
                <div class="d-flex pt-4">
                    <div class="col-lg-4">
                        <img src="{{url('uploads')}}/{{$item->image}}" alt="" style="width: 100%; height: 150px;">
                    </div>
                    <div class="col-lg-8 shop-blog">
                        <h6>{{$item->name}}</h6>
                        <p>{{$item->author}}</p>
                        <a href="{{route('blog_detail', ['id'=>$item->id])}}">GET</a>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">
                <p>Have {{$total_product}} product </p>
                @foreach ($product as $item)
                <div class="col-lg-4 pt-5 pb-3">
                    <div class="btn" style="">
                        <a href="{{route('product.detail',['id'=>$item->id])}}">
                            <img src="{{url('uploads')}}/{{$item->images}}"
                                class="card-img-top img-product" alt="..." height="350px" width="100%">
                        </a>
                        <div class="card-body text-start">
                            <a href="" class="">
                                <p class=" ">{{$item->name}}</p>
                            </a>
                            @if ($item->sale_price==0)
                                <h5 style="padding-top: 0; padding-left: 0;" > {{$item->price}} $</h5>
                            @else
                            <div class="d-flex">
                                <del style="padding-right: 50px; color: #707070">{{$item->price}}$</del>
                                <h5 style="padding-top: 0; padding-left: 0; color: brown" > {{$item->sale_price}} $</h5>

                            </div>
                            @endif
                            
                        </div>
                        <div style="border: 1px #036f12 solid;">
                            <a href="{{route('cart.add', ['id'=>$item->id] )}}" style=" background-color: white; width: 100%; text-decoration: none; color: brown ">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$product->appends(request()->all())->links() }}
        </div>

        @include('frontend.layout.shipment');
    </div>
</div>
@endsection