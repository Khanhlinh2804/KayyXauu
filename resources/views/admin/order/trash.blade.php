@extends('backend.index')
@section('title','List order')
    
@section('content')
<div id="page-wrapper">
     <div class="row">

        <?php $user = Auth::user(); ?>
            <div style="display: inline;">
                <p></p>
                <form class="form-inline my-2 my-lg-0" action="">
                    
                    <div class="col-lg-7">
                    <a href="{{route('admin.order.index')}}" class="btn btn-outline-success">LIST ORDER</a>
                    </div>
                    <div class="col-lg-5 right">
                        <input class="form-control mr-sm-2" style="width: 80%;" name="key" placeholder="Search by name..." aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    
                    </div>
                </form>
            </div>
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
                @foreach ($orders as $item)
                    
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
                                <span style="color: green">Đang chờ xác nhận</span>
                                @elseif($item->status == 2)
                                <span  style="color: rgb(151, 196, 4)">Đã xác nhận đơn hàng</span>
                                @elseif($item->status == 3)
                                <span  style="color: rgb(9, 242, 226)">Đã đóng gói và gửi đến đơn vị vận chuyển</span>
                                @elseif($item->status == 4)
                                <span  style="color: rgb(9, 32, 242)">Đơn hàng đang giao</span>
                                @elseif($item->status == 5)
                                <span  style="color: rgb(143, 8, 8)">Giao hàng thành công</span>
                                @else
                                <span  style="color: rgb(0, 0, 0)" >Giao hàng thất bại</span>
                            @endif
                        </td>
                        <td class="">
                            
                            {{-- @if ($user->can('admin.order.edit') && $user->can('admin.order.update') ) --}}
                            <a href="{{route('admin.order.restore',$item->id)}}" class="btn btn-outline-success">BACK</a>
                            <a href="{{route('admin.order.deleteforce',$item->id)}}" class="btn btn-outline-success">CLEAD</a>
                            {{-- @endif --}}
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}
    {{$orders->appends(request()->all())->links()}}
</div>
@endsection
{{-- @endsection --}}