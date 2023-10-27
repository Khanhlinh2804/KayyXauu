@extends('frontend.index')
@section('title','Home')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>Profile</p>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-5">
            <h1>Hello {{$user->name}}</h1>
            <table class="table">
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>
                            <input type="text" name="phone" style="border: 0" value="{{$user->phone}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="email" name="email" style="border: 0" value="{{$user->email}}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{route('profile.edit')}}">Edit Infomation</a>
            <div class="d-flex pt-3" >
                <div class="col-lg-2">
                    
                    <p>
                        KAYXAU
                    </p>
                </div>
                <div class="col-lg-10 pt-3">
                    <div class="line"></div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-7 text-about">
            <div class="profile-image">
                {{-- <img src="{{url('uplaods')}}/{{$user->image}}" alt="" width="100%" height="400px"> --}}
                <img src="{{url('')}}/assets/imgs/standard.png" alt="" >
            </div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-6">
            <div>
                <h3>STORY US</h3>
                <p>Ariana Join founded Kay xau mini in 2012. Passionate about plants, she wanted to help demystify them, make them accessible to non-gardeners, and enhance the experience beyond micro local garden supply center. She broke new ground with an online plant delivery business that has grown to include stores in New York City, Los Angeles and San Francisco. Hands-on educational workshops are now offered in-store and online, and the brand vision has expanded beyond plants to include biophilic design that evokes an essential connection to the natural world . If you don't make time for them, you probably don't make time for yourself either.
                    Kay xau mini is here to help you connect with plants and nature, so you can cultivate a good life.
                </p>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <img src="{{url('')}}/assets/imgs/Thumnail.png" alt="" style="width: 100%;">
        </div>
    </div>
    <hr>
    <div class="row pt-5">
        <div class="col-lg-5">
            <img src="{{url('')}}/assets/imgs/Thumnail.png" alt="" style="width: 100%;">
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
            <div>
                <h3>STORY US</h3>
                <p>Ariana Join founded Kay xau mini in 2012. Passionate about plants, she wanted to help demystify them, make them accessible to non-gardeners, and enhance the experience beyond micro local garden supply center. She broke new ground with an online plant delivery business that has grown to include stores in New York City, Los Angeles and San Francisco. Hands-on educational workshops are now offered in-store and online, and the brand vision has expanded beyond plants to include biophilic design that evokes an essential connection to the natural world . If you don't make time for them, you probably don't make time for yourself either.
                    Kay xau mini is here to help you connect with plants and nature, so you can cultivate a good life.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection