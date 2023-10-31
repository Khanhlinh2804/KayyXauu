@extends('frontend.index')
@section('title','Home')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>Profile Update</p>
</div>
<div class="container">
    <form action="{{route('profile.update')}}" enctype="multipart/form-data" method="post">
        <div class="row pt-5">
            @csrf
            @method('patch')
            <div class="col-lg-5">
                <table class="table profile-table">
                    <tbody>
                        <tr>
                            <td scope="row">Name</td>
                            <td>
                                <input type="text" value="{{$user->name}}" name="name" style="border: 0">
                            </td>
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
                
            </div>
            <div class="col-lg-7 text-about">

                <div class="profile-image">
                    <input type="file" name="image" id=""
                    {{old('$user->image')}}>
                    <img src="{{url('')}}/assets/imgs/standard.png" alt="" >
                </div>
            </div>
        </div>
        <div class="profile-update pb-5">
            <button type="submit" >Update</button>
        </div>
    </form>
 
</div>
@endsection