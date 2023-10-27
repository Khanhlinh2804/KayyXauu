@extends('backend.index')
@section('title','Contact Update')
@section('linh')
    <div class="container">
        <form action="{{route('category.update', $contact->id)}}" method="post"  role="form">
            @csrf
            @method('put')
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Frist Name</label>
                <input type="text" name="name" value="{{$contact->name}}" class="form-control" >
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" name="full" value="{{$contact->full}}" class="form-control" >
                @error('full')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone" value="{{$contact->phone}}" class="form-control">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group" style="padding-top: 10px">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" value="{{$contact->email}}" class="form-control" >
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Note</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note">{{$contact->note}}</textarea>
                </div>
            </div>
            <br>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection