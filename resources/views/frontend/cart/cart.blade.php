@extends('frontend.index')
@section('title','Cart')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/10.png" alt="">
    <p>Cart</p>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-11">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span class="text-success">Cart</span></li>
                    <li class="breadcrumb-item"><span class="text-body-tertiary">Checkout</span></li>
                    <li class="breadcrumb-item"><span class="text-body-tertiary">Comfirm</span></li>
                </ol>
            </nav>
            <p>
                There are {{count((array) session('cart'))}} items in the cart 
            </p>
        </div>
    </div>
    @if (session('success'))
            <div class="aleat-success">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('success') }}
                    </strong>
                </div>
            </div>           
        @endif
    <div class="row pt-5">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Product</th>
                        <th scope="col"></th>
                        <th scope="col">Price</th>
                        {{-- <th scope="col" >Quantity available</th> --}}
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0
                    @endphp
                    @php
                        $quatity = 0
                    @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $item) 
                            @php
                                $total += $item['price'] * $item['quatity']
                            @endphp  
                            @php
                                $quatity += $item['quatity']
                            @endphp  
                            <tr data-id="{{$id}}">
                                <th scope="row" data-th="Product">{{$loop->iteration}}</th>
                                <td>{{$item['name']}}</td>
                                <td>
                                    <img src="{{url('uploads')}}/{{$item['images']}}" alt="" width="80%" height="150px" srcset="">
                                </td>
                                <td data-th="price">
                                    {{-- @if ($item['sale_price'] == 0)
                                         --}}
                                    <h4>
                                        {{$item['price']}} <span style="color: brown">$</span></td>
                                    </h4>
                                    {{-- @else
                                    <h4>
                                        {{$item['sale_price']}} <span style="color: brown">$</span></td>
                                    </h4> --}}
                                        
                                    {{-- @endif --}}

                                <td data-th="quatity">
                                    <div class="cart-quatity">
                                        <input type="number" class="cart_update quatity" value="{{$item['quatity']}}" min="1" />
                                    </div>
                                    
                                </td>
                                <td data-th="total">$ {{$item['price'] * $item['quatity'] }}</td>
                                <td>
                                    <button type="submit" class="cart-remove"  >
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row pb-5 pt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-8">
            <h3>Total</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Total Price</td>
                        <td style="color: rgb(229, 4, 4);">$ {{$total}}</td>
                    </tr>
                    <tr>
                        <td>Total Quantity</td>
                        <td style="color: rgb(229, 4, 4);"> {{$quatity}} </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-6">
                    <div class="pt-4 cart-shop">
                        <a href="{{route('shop')}}">
                            <i class="fas fa-arrow-left"></i><span class="p-3">Back Shop</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-4">
                    <div class=" pt-1 cart-checkout text-center ">
                        <a href="{{route('cart.checkout')}}" class=" text-center pb-2">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.layout.shipment')
</div>

@endsection
@section('js')
    <script type="text/javascript">
        $(".cart_update").change(function (e){
            e.preventDefault();
            var ele = $(this);

            $.ajax({
                url: '{{ route('cart_update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quatity: ele.parents("tr").find(".quatity").val()
                },
                success: function(response){
                    window.location.reload();
                }
            });
        });


        $(".cart-remove").click(function(e){
            e.preventDefault();
            var ele = $(this);
            if(confirm("Do you want delete item in cart")){
                // alert("Delete success");
                $.ajax({
                    url: '{{route('cart_remove') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response){
                        window.location.reload();
                    }
                });
            }
        });
        
    </script>
@endsection