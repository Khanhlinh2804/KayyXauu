@extends('backend.index')
@section('title','banner Create')
@section('linh')
    <div class="container">
        <form action="{{route('banner.update', $banner->id)}}" method="post" enctype="multipart/form-data"  role="form">
            @csrf
            @method('put')
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{$banner->name}}" class="form-control" placeholder="Name's banner">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Link</label>
                <input type="text" name="link" class="form-control" value="{{$banner->link}}"  placeholder="image">
                @error('summary')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Summary</label>
                <input type="link" name="summary" class="form-control" value="{{$banner->summary}}"  placeholder="Link">
                @error('summary')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" >
                <label for="exampleInputEmail1">Image</label>
                <br>
                <input type="file" name="image"  value="{{old('image') ?? $banner->image}}" >
                <div class="pt-3">
                    <span>
                        <img src="/uploads/{{$banner->image}}" alt="" style="width: 150px; height: 200px;">
                    </span>
                </div>
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <h1></h1>
            <div class="form-group">
                <label for="" style="padding-top: 10px">Status</label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="Active"  {{$banner->status == 'Active' ? 'checked' : ''}}>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="No Active"  {{$banner->status == 'No Active' ? 'checked' : ''}}>
                No Active
                </label>
            </div>
            <br>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection