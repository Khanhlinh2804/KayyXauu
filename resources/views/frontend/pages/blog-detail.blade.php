@extends('frontend.index')
@section('title','Blog')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/7.png" alt="">
    <p>Blog</p>
</div>
<div class="container">
    <div class="row pt-5">
         <div class="col-lg-3">
            <div class="blog-library">
                <h3>Library</h3>
                <ul class="shop-ul-li">
                        <li>
                            <a href="{{route('blog')}}">
                                All
                            </a>
                        </li>
                        <li>
                            @foreach ($skill as $item)
                            <a href="">
                                {{$item->name}}
                            </a>
                            @endforeach
                        </li>
                        
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
        </div>
        <div class="col-lg-9">
            <div>
                <h2 class="pb-5">{{$blog->name}}</h2>
                <h6>{{$blog->created_at}} / by {{$blog->author}}</h6>
            </div>
            <div class="blog-detail-summary">
                <p>summary {{$blog->summary}}</p>
                <img src="{{url('uploads')}}/{{$blog->image}}" alt="" width="100%" height="400px">
            </div>
            <div class="pt-5 pb-5">
                <p>Content{{$blog->content}}</p>
            </div>
            <div class="blog-detail-text">
                <h6>Tags: <samp>{{$blog->tag}}</samp></h6>

            </div>
            <div class="blog-detail-text">
                <h6>Share: </h6>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-telegram-plane"></i>
            </div>



        </div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 pt-3">
            <div>
                <h2>Comment</h2>
                <hr>
                @foreach ($comment as $item)
                <div class="row">
                    <div class="col-lg-2">
                        <img src="" alt="">
                    </div>
                    <div class="col-lg-9">
                        <div class="pb-5 pt-3">
                            <p>{{$item->name}} <span> {{$item->created_at}}</span></p>
                            <p>{{$item->content}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- kieemr tra xem ddawng nhaap chuwa mowis cho comment --}}
            @if (Auth::check())               
                @if (session('success'))
                    <div style="color: brown">
                        <strong>
                            {{ session('success') }}
                        </strong>
                    </div>           
                @endif
                <div class="pb-5">
                    <h2>Add comment</h2>
                    <form action="{{route('comment')}}" method="post">
                        @csrf
                        <div class="form-group contact" >
                            <input type="text" name="content" class="form-control" placeholder="Comment">
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group contact" >
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group contact" >
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-lg-4">
                                <button type="submit" class="contact-submit">Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                
            @endif
            <div>
                <h2>Maybe you are interested</h2>
                <div class="row">
                    {{-- this is 2 item --}}
                    <div class="col-lg-6">
                        <div>
                            <div class="blog-size-big btn">
                                <img src="{{url('')}}/assets/imgs/8.png" alt="" width="500px" height="300px">
                                <div>
                                    <p>name</p>
                                    <div class="blog-text-img">
                                        <p>date</p>
                                        <a href="" style="">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>
    </div>
</div>
@endsection