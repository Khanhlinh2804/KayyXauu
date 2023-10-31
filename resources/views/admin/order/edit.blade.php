@extends('backend.index')
@section('title','Order')
@section('linh') 
<div id="page-wrapper" class="container">
    <form action="{{route('order.update',$order->id)}}" method="post" role="form">
        @method('put')
        @csrf
        <h1>Order Infomation</h1>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Adderss</th>
                <th>Email</th>
            </tr>
            <tbody>
                <tr>
                    
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->DataCity->name}},{{$order->district->name}},{{$order->address}}</td>
                    <td>{{$order->email}}</td>
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <label >Status</label>
            <select class="form-control"  name="status">
                <option value="1" @if ($order->status == 1)
                    @endif
                >Waiting for confirmation</option>
                <option value="2" @if ($order->status == 2)
                    @endif
                    >Order confirmed</option>
                <option value="3" @if ($order->status == 3)
                    @endif
                    >Packaged and sent to the shipping carrier</option>
                <option value="4" @if ($order->status == 4)
                    @endif
                    >Order in transit</option>
                <option value="5" @if ($order->status == 5)
                    @endif
                    >Delivery successful</option>
                <option value="6" @if ($order->status == 6)
                    @endif
                    >Delivery failed</option>
            </select>
        </div>
        <div class="pt-4 order-admin">
            <button type="submit" class="btn btn-primary ">Update</button>
        </div>
    </form>
    <h1>Order Details</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_detail as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->products->name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</div>
@endsection