@extends('backend.index')
@section('title','User')
@section('linh')  
<div class="container">
    <form action="">
            <div class="row pb-2 pt-2">
                <div class="d-flex">

                    <div class="col-lg-1">
                        <a href="{{route('order.create')}}" class="btn btn-success">
                            <ion-icon name="duplicate-outline" class="icon-add"></ion-icon>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{route('order.trashed')}}" class="btn btn-danger">
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
        <h2>List of order </h2>
        <hr> 

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    {{-- <th>User</th> --}}
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        {{-- <td></td> --}}
                        <td>{{$item->cityData->name}},{{$item->districtData->name}},{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->note}}</td>
                        <td>
                            @if ($item->status == 1)
                                <span style="color: green">Waiting for confirmation</span>
                            @elseif($item->status == 2)
                                <span style="color: rgb(151, 196, 4)">Order confirmed</span>
                            @elseif($item->status == 3)
                                <span style="color: rgb(9, 242, 226)">Packaged and sent to the shipping carrier</span>
                            @elseif($item->status == 4)
                                <span style="color: rgb(9, 32, 242)">Order in transit</span>
                            @elseif($item->status == 5)
                                <span style="color: rgb(143, 8, 8)">Delivery successful</span>
                            @else
                                <span style="color: rgb(0, 0, 0)">Delivery failed</span>
                            @endif

                        </td>
                        <td class="">
                            <a href="{{route('order.edit',$item->id)}}" class="btn btn-outline-success">EDIT</a>
                                <form action="{{route('order.destroy', $item->id)}}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick=" return confirm('You want delete order ?')">DELETE</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{$order->appends(request()->all())->links()}}
</div>
@endsection