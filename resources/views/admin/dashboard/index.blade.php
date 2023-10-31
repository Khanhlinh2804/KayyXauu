@extends('backend.index')
@section('title','dashboard')
@section('linh')        
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{$totalproduct}}</div>
                        <div class="cardName">Product</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div >
                        <div class="numbers">{{$ordertotal}}</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$comment}}</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="{{route('order.index')}}" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $item)
                                
                            <tr>
                                <td>{{$item->name}}</td>
                                {{-- <td>{{$item->detail->name}}</td> --}}
                                <td>{{$item->payment}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="status inProgress">Waiting for confirmation</span>
                                    @elseif($item->status == 2)
                                        <span class="status delivered">Order confirmed</span>
                                    @elseif($item->status == 3)
                                        <span class="status pending" >Packaged and sent to the shipping carrier</span>
                                    @elseif($item->status == 4)
                                        <span style="color: rgb(9, 32, 242)">Order in transit</span>
                                    @elseif($item->status == 5)
                                        <span style="color: rgb(143, 8, 8)">Delivery successful</span>
                                    @else
                                        <span class="status return">Delivery failed</span>
                                    @endif
                                    
                            </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        @foreach ($user as $item)
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="{{url('uploads')}}/{{$item->image}}" alt=""></div>
                            </td>
                            <td>
                                <h4>{{$item->name}} <br> <span>{{$item->status}}</span></h4>
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
</div>
@endsection
