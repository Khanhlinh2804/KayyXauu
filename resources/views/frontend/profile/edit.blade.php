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
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>
                                {{Auth::user()->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                {{Auth::user()->email}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            <a href="{{route('profile.edit')}}">Edit Infomation</a>
            <br>
            <a href="{{route('profile.editPassword')}}">Edit PassWord</a>
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
                <img src="{{url('uploads')}}/{{Auth::user()->image}}" alt="" >
            </div>
        </div>
    </div>
    {{-- <div class="row pt-5">
        <h1 class="pb-5">Order</h1>
        <div class="col-lg-1"></div>
        
        <div class="col-lg-10">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Time Order</th>
                        <th>Time Update</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)  
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <a href="{{route('profile.show',['id'=>$item->id])}}">
                                    {{$item->name}}{{$item->full}}
                                </a>
                            </td>
                            
                            <td>{{$item->updated_at->format('d/m/Y')}}</td>
                            <td>
                                @if ($item->status == 1)
                                        <span style="color: green">Waiting for confirmation</span>
                                    @elseif($item->status == 2)
                                        <span style="color: rgb(151, 196, 4)">Order confirmed</span>
                                    @elseif($item->status == 3)
                                        <span style="color: rgb(9, 242, 226)">Packaged and sent to the shipping carrier</span>
                                    @elseif($item->status == 4)
                                        <span style="color: rgb(9, 32, 242)">Order in transit</span>
                                    @elseif($item->status == 5)
                                        <span style="color: rgb(143, 8, 8)">Delivery successful</span>
                                    @else
                                        <span style="color: rgb(0, 0, 0)">Delivery failed</span>
                                    @endif
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
</div>


@endsection