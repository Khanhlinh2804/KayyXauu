@extends('backend.index')
@section('title','Order')
@section('linh') 
<div class="container">
     <div class="row">

        <form action="">
            <div class="row pb-2 pt-2">
                <div class="col-lg-7">
                    <a href="{{route('order.index')}}" class="btn btn-success">
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
    </div>
        <h2>List of order delete</h2>
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
                        <td>{{$item->DataCity->name}},{{$item->district->name}},{{$item->address}}</td>
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
                            
                            <a href="{{route('order.restore',$item->id)}}" class=""><ion-icon name="enter-outline" class="button-icon-update"></ion-icon></a>
                            <a href="{{route('order.delete',$item->id)}}" ><ion-icon name="trash-bin-outline" class="bin-outline"></ion-icon></a> 
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}
    {{$order->appends(request()->all())->links()}}
</div>
@endsection
{{-- @endsection --}}