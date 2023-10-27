@extends('frontend.index')
@section('title','Home')
@section('content')
<div class="container">
    {{-- --------Carousel------------  --}}
    <div class="slider">
        <input type="radio" name="toggle" id="btn-1" checked>
        <input type="radio" name="toggle" id="btn-2">
        <input type="radio" name="toggle" id="btn-3">

        <div class="slider-controls">
            <label for="btn-1"></label>
            <label for="btn-2"></label>
            <label for="btn-3"></label>
        </div>

        <ul class="slides">
            <li class="slide">
            <div class="slide-content">
                <h2 class="slide-title">Slide #1</h2>
                <p class="slide-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat dignissimos commodi eos totam perferendis possimus dolorem, deleniti vitae harum? Enim.</p>
                <a href="#" class="slide-link">Learn more</a>
            </div>
            <p class="slide-image">
                <img src="https://placeimg.com/320/240/tech" alt="stuff" width="320" height="240">
            </p>
            </li>
            <li class="slide">
            <div class="slide-content">
                <h2 class="slide-title">Slide #2</h2>
                <p class="slide-text">Nisi ratione magni ea quis animi incidunt velit voluptate dolorem enim possimus, nam provident excepturi ipsam nihil molestiae minus delectus!</p>
                <a href="#" class="slide-link">Amazing deal</a>
            </div>
            <p class="slide-image">
                <img src="https://placeimg.com/320/240/animals" alt="stuff" width="320" height="240">
            </p>
            </li>
            <li class="slide">
            <div class="slide-content">
                <h2 class="slide-title">Slide #3</h2>
                <p class="slide-text">Quisquam quod ut quasi, vero obcaecati laudantium asperiores corporis ad atque. Expedita fugit dicta maxime vel doloribus sequi, facilis dignissimos.</p>
                <a href="#" class="slide-link">Get started</a>
            </div>
            <p class="slide-image">
                <img src="https://placeimg.com/320/240/any" alt="stuff" width="320" height="240">
            </p>
            </li>
        </ul>
    </div>
    {{-- ------------introduce----------- --}}
    <hr>
    <div class="row pt-5 pb-5">
        <div class="col-lg-7 d-flex">
            <div>
                <img src="{{url('')}}/assets/imgs/1.png" alt="" class="img-introducte">
                <h4 style="padding-top: 250px">KAYXAU</h4>
                
            </div>
            <div class="img-introducte2 " >
                <img src="{{url('')}}/assets/imgs/standard.png" alt="" >
            </div>
        </div>
        <div class="col-lg-5 pl-5">
            <h3>INTRODUCE</h3>
            <div class="home-about">
                <p>
                    Mini Plants are here to help strengthen your relationship with plants. We make buying
                    plants easy by delivering healthy, ready-to-go plants, setting you up with the tips
                    and tricks you need to help your plants thrive. Plants make life better. We make 
                    growing plants easy. So we offer new ways to infuse this restorative beauty into 
                    as many daily rituals as possible, through bio-preferred design to increase Connect with the natural world
                    </p>
                <a href="{{route('about')}}">
                    <h5>
                        <i class="fas fa-angle-double-right"></i>
                    </h5>
                </a>
            </div>
        </div>
    </div>
    {{-- ---------Category------------ --}}
    <div class="row">
        <h1>Category</h1>
        <hr>
        @foreach ($category as $item)
        <div class="col-lg-3 ">
            <a href="{{route('shop')}}">
                <figure>
                    <img src="{{url('uploads')}}/{{$item->image}}" class="Mountains" alt="Mountains">
                    <figcaption>{{$item->name}}</figcaption>
                </figure>
            </a>
        </div>
        @endforeach
    </div>

    {{-- -------outstanding product--------  --}}
    <div class="row pt-5">
        <h1>Outstanding Product</h1>
        <hr>
        @foreach ($product as $item)   
            <div class="col-lg-3 pt-5">
                <div class="btn" style="">
                    <a href="{{route('product.detail',['id'=>$item->id])}}">
                        <img src="{{url('uploads')}}/{{$item->images}}"
                        class="card-img-top img-product" alt="..." width="100%" height="400px">
                    </a>
                    <div class="card-body">
                        <a href="" class="">
                            <p class=" ">{{$item->name}}</p>
                            <del>{{$item->sale_price}}$</del>
                        </a>
                        <h5 class="text-start" > {{$item->price}} $</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ----------Outstanding Blog----------  --}}
    <div class="row pt-5 pb-5">
        <h1>Outstanding Blogs</h1>
        <hr>
        @foreach ($blog as $item)
            <div class="col-lg-6 home-blog">
                <div class="text-home">
                    <h2>{{$item->id}}</h2>
                    <h5>{{$item->name}}</h5>
                    <div class="home-right d-flex">
                        <p>{{$item->created_at}}</p>
                        <a href="{{route('blog_detail',['id'=>$item->id])}}">
                            <i class="fas fa-chevron-right" style="color: #949492"></i>
                        </a>
                    </div>
                    <img src="{{url('uploads')}}/{{$item->image}}" alt="" srcset="">
                </div>

            </div>
        @endforeach
        @foreach ($blogs as $item)
        <div class="col-lg-6 home-blog">
            <div class="text-home ">
                <img src="{{url('uploads')}}/{{$item->image}}" alt="" srcset="">
                <h2>{{$item->id}}</h2>
                <h5>{{$item->name}}</h5>
                <div class="home-left d-flex">
                    <p>{{$item->created_at}}</p>
                    <a href="" class="hihi-home">
                        <i class="fas fa-chevron-right" style="color: #949492"></i>
                    </a>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
    	

    

    @include('frontend.layout.shipment')
</div>
@endsection