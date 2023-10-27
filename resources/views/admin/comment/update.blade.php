@extends('backend.index')
@section('title','comment Create')
@section('linh')
    <div class="container">
        <form action="{{route('comment.update', $comment->id)}}" method="post" enctype="multipart/form-data"  role="form">
            @csrf
            @method('put')
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" value="{{$comment->name}}" >
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="{{$comment->email}}" class="form-control" placeholder="Email">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Comment</label>
                <input type="text" name="content" class="form-control" value="{{$comment->content}}">
                @error('comment')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group pb-5" style="padding-top: 10px" >
                <label for="exampleInputEmail1">User</label>
                <input type="text" name="user"  class="form-control" value="{{$comment->user}}">
                @error('user')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection