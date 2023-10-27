@extends('backend.index')
@section('title','comment List')
@section('linh')
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="col-lg-7">
                    <a href="{{route('comment.index')}}" class="btn btn-success">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </a>
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
                <th scope="col">User</th>
                <th scope="col">Content</th>
                <th scope="col">Email</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comment as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->user}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a href="{{route('comment.restore',$item->id)}}" class=""><ion-icon name="enter-outline" class="button-icon-update"></ion-icon></a>
                            <a href="{{route('comment.delete',$item->id)}}" ><ion-icon name="trash-bin-outline" class="bin-outline"></ion-icon></a> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$comment->appends(request()->all())->links() }}
    </div>
@endsection