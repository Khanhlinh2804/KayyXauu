@extends('backend.index')
@section('title','Category Create')
@section('linh')
    <div class="container">
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name's Category">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Name</label>
                <input type="file" name="image" class="form-control" placeholder="Name's Category">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <h1></h1>
            <div class="form-group">
                <label for="" style="padding-top: 10px">Status</label>
                <br>
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="active" checked>
                    Active
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="status" id="" value="No active">
                No Active
                </label>
            </div>
            <br>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection