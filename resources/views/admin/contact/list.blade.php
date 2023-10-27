@extends('backend.index')
@section('title','Contact List')
@section('linh')
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="d-flex">
                    <div class="col-lg-6">
                        <a href="{{route('contact.trashed')}}" class="btn btn-danger">
                            <ion-icon name="trash-outline" class="icon-add"></ion-icon>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="search">
                            <label>
                                <input type="text" name="key" placeholder="Search here" style="width: 100%">
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
                            <form action="{{route('contact.destroy',$item->id)}}" method="post">
                                <a href="{{route('contact.edit',$item->id)}}" class="button-icon-update"><ion-icon name="create-outline" class="icon-delete"></ion-icon></a>
                                @method('delete')
                                @csrf
                                <button type="submit" class="button-icon-delete"><ion-icon name="close-outline" class="icon-delete"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$contact->appends(request()->all())->links() }}
    </div>
@endsection