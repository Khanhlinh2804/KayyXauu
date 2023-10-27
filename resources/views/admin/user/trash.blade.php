@extends('backend.index')
@section('title','Product')
@section('linh')            
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="d-flex">

                    <div class="col-lg-1">
                        <a href="{{route('user.create')}}" class="btn btn-success">
                            <ion-icon name="duplicate-outline" class="icon-add"></ion-icon>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{route('user.trashed')}}" class="btn btn-danger">
                            <ion-icon name="trash-outline" class="icon-add"></ion-icon>
                        <a>
                    </div>
                    <div class="col-lg-5">
                        <div class="search">
                            <label>
                                <input type="text" name="key" placeholder="Search here">
                                <button type="submit" style="">
                                    <ion-icon name="search-outline" style="padding-top: 10px;"></ion-icon>
                                </button>
                            </label>
                        </div>
                    </div>                        
                </div>
            </div>
        </form>
        @if (session('success'))
            <div class="aleat-success">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('success') }}
                    </strong>
                </div>
            </div>           
        @endif
        <h3>List</h3>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Image</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <img src="{{url('uploads')}}/{{$item->images}}" style="width: 120px;
                                height: 150px;" alt="">
                        </td>
                        <td>
                            <a href="{{route('user.restore',$item->id)}}" class="button-icon-update"><ion-icon name="enter-outline" class="button-icon-update"></ion-icon></a>
                            <a href="{{route('user.delete',$item->id)}}" class="button-icon-update"><ion-icon name="trash-bin-outline" class="bin-outline"></ion-icon></a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$user->appends(request()->all())->links() }}
    </div>          

@endsection
