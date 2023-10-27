@extends('backend.index')
@section('title','Category Create')
@section('linh')
    <div class="container">
        <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data"  role="form">
            @csrf
            @method('put')
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Name's Category">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" >
                <label for="exampleInputEmail1">Image</label>
                <br>
                <input type="file" name="image"  value="{{old('image') ?? $category->image}}" >
                <div class="pt-3">
                    <span>
                        <img src="/uploads/{{$category->image}}" alt="" style="width: 150px; height: 200px;">
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
                    <input type="radio" class="form-check-input" name="status" id="" value="Active"  {{$category->status == 'Active' ? 'checked' : ''}}>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="No Active"  {{$category->status == 'No Active' ? 'checked' : ''}}>
                No Active
                </label>
            </div>
            <br>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection