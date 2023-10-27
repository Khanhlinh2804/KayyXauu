@extends('backend.index')
@section('title','Edit order')

@section('content')
<div id="page-wrapper">
    <form action="{{route('order.update',$orders->id)}}" method="post" role="form">
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
                    <td>{{$order->city->name}},{{$order->district->name}},{{$order->address}}</td>
                    <td>{{$order->email}}</td>
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value="1" @if ($orders->status == 1)
                    @endif
                >Waiting for confirmation</option>
                <option value="2" @if ($orders->status == 2)
                    @endif
                    >Order confirmed</option>
                <option value="3" @if ($orders->status == 3)
                    @endif
                    >Packaged and sent to the shipping carrier</option>
                <option value="4" @if ($orders->status == 4)
                    @endif
                    >Order in transit</option>
                <option value="5" @if ($orders->status == 5)
                    @endif
                    >Delivery successful</option>
                <option value="6" @if ($orders->status == 6)
                    @endif
                    >Delivery failed</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update</button>
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
            @foreach ($orders->order_detail as $item)

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