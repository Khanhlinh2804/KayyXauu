@extends('backend.index')
@section('title','User edit')
@section('linh')
    <div class="container">
        <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6">

                    <div class="form-group" style="padding-top: 10px">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Name's ">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Phone">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" style="padding-top: 10px">Status</label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="Active" {{$user->status == 'Active' ? 'checked' : ''}}>
                            Active
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="No active" {{$user->status == 'No Active' ? 'checked' : ''}}>
                        No Active
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="padding-top: 10px">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" value=" {{$user->image}}" class="form-control" placeholder="">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password's user">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                     <div class="form-group pt-2">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="confirm_password" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Password Confirmation" value="{{ old('password_confirmation') }}"
                            aria-describedby="helpId">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                </div>
            </div>
            <br>
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection