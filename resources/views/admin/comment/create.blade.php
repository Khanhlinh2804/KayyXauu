@extends('backend.index')
@section('title','Category Create')
@section('linh')
    <div class="container">
        <form action="{{route('comment.store')}}" method="post" role="form">
            @csrf
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="{{'null@gmail.com'}}" class="form-control" placeholder="Email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Comment</label>
                <input type="text" name="content" class="form-control" placeholder="Comment">
                @error('comment')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group pb-5" style="padding-top: 10px" >
                <label for="exampleInputEmail1">User</label>
                <input type="text" name="user"  class="form-control" placeholder="User">
                @error('user')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection