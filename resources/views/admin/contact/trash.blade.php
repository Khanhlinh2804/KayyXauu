@extends('backend.index')
@section('title','Contact List Trash')
@section('linh')
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="col-lg-1">
                    <a href="{{route('contact.index')}}" class="btn btn-success">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </form>
       @if (session('error'))
           <div class="aleat-success">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('error') }}
                    </strong>
                </div>
            </div>     
       @endif
        <h3>Trash List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FullName</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Note</th>
                    <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td> {{$item->name}} {{$item->full}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->note}}</td>
                        <td>
                            <a href="{{route('contact.restore',$item->id)}}" class=""><ion-icon name="enter-outline" class="button-icon-update"></ion-icon></a>
                            <a href="{{route('contact.delete',$item->id)}}" ><ion-icon name="trash-bin-outline" class="bin-outline"></ion-icon></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$contact->appends(request()->all())->links() }}
    </div>
@endsection