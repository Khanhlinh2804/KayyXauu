@extends('frontend.index')
@section('title','Checkout')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/10.png" alt="">
    <p>Checkout</p>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-11">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span class="text-success">Cart</span></li>
                    <li class="breadcrumb-item"><span class="text-success">Checkout</span></li>
                    <li class="breadcrumb-item"><span class="text-body-tertiary">Comfirm</span></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <h2 class="text-capitalize">Detail Order</h2>
        </div>
        <div class="col-lg-4">
            <h2 class="text-capitalize">Order</h2>
        </div>
    </div>
    <form action="{{route('cart.store')}}" method="post">
        @csrf
        <div class="row pb-5">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group contact">
                            <input type="text" name="name" class="form-control" placeholder="FirstName">
                            @error('firstname')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group contact">
                            <input hidden type="text" name="user_id" value="{{Auth::user()->id}}" class="form-control" >
                            @error('user_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group contact">
                            {{-- <input type="text" class="checkout-input" hidden value="{{ Auth::user()->name}}" > --}}
                            <input type="text" name="lastname" class="form-control" placeholder="LasttName">
                            @error('lastname')
                            <p class="text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="contact">
                    <select class="form-select border-top-0 border-start-0 border-end-0" 
                    name="city" id="city" >
                        <option value="" selected disabled>Select a city</option>
                        @foreach ($city as $data)
                            <option value="{{ $data->id }}" {{ old('city') == $data->id ? 'selected' : '' }}>{{ $data->name }}{{ $data->id }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="contact">
                    <select class="form-select border-top-0 border-start-0 border-end-0" name="districts" >
                        <option value="" selected disabled>Select a district</option>
                        @foreach ($district as $data)
                            <option value="{{ $data->id }}" {{ old('districts') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div> --}}


                <div class="contact">
                    <select class="form-select border-top-0 border-start-0 border-end-0 "
                         name="districts" id="districts">
                    </select>
                </div>
                <div class="form-group contact">
                    <input type="text" name="address" class="form-control" placeholder="Street">
                    @error('address')
                    <p class="text-danger">{{ $message}}</p>
                    @enderror
                </div>
                <div class="form-group contact">
                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Street">
                    @error('address')
                    <p class="text-danger">{{ $message}}</p>
                    @enderror
                </div>
                <div class="form-group contact pb-5">
                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                    @error('phone')
                    <p class="text-danger">{{ $message}}</p>
                    @enderror
                </div>
                <div class="pt-5">
                    <h4 class="text-capitalize">
                        Note
                    </h4>
                </div>
                <div class="form-group">
                    <div class="mb-3 pt-3 contacts">
                        <textarea class="form-control"  rows="5" name="note" placeholder="Message"> No</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"></div>
                </div>
            </div>
            <div class="col-lg-1 vr">

            </div>
            <div class="col-lg-4 ">
                <div class="pt-5">
                    <h4>Order item product</h4>
                </div>
                <table class="table">
                    <tbody>
                        @php
                        $total = 0
                    @endphp
                    @php
                        $quatity = 0
                    @endphp
                    @if (session('cart')) 
                        @foreach (session('cart') as $id=>$item)
                           @php
                                $total += $item['price'] * $item['quatity']
                            @endphp  
                            @php
                                $quatity += $item['quatity']
                            @endphp  
                        <tr>
                            <td>
                                <img src="{{url('uploads')}}/{{$item['images']}}" alt="" width="100px" height="100px" srcset="">
                            </td>
                            <td >
                                <p style="color: rgb(229, 4, 4);">$ {{$item['price']}}</p>
                                <p > Quantity: {{$item['quatity']}}</p>
                            </td>
                        </tr>
                        
                        @endforeach  
                    @endif
                    </tbody>
                </table>
                <div class="pt-5">
                    <h4>Shipping information</h4>
                </div>
                <div class="form-check pt-3">
                    <input class="form-check-input" type="radio" value="cod" name="payment">
                    <label class="form-check-label">
                        Payment on delivery
                    </label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input" type="radio" value="vnpay" name="payment">
                    <label class="form-check-label" for="flexCheckChecked">
                        Vn Pay
                    </label>
                </div>
                </table>
                <div class="pt-5">
                    <h4>Total</h4>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Total Price</td>
                            <td style="color: rgb(229, 4, 4);">$ {{$total}} </td>
                        </tr>
                        <tr>
                            <td>Total Quantity</td>
                            <td style="color: rgb(229, 4, 4);">Item: {{$quatity}} </td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-0">
                        <button type="submit" class="contact-submit">Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('frontend.layout.shipment')
</div>
</div>
@endsection
@section('js')
    <script type="text/javascript" >
        $(document).ready(function() {
            $('#city').change(function(event){
                var idCity = this.value;
                $('#districts').html('');
                $.ajax({
                    url: "{{ route('cart.district') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {city_id: idCity, _token: "{{ csrf_token() }}"},
                    success: function(response){
                        $('#districts').html('<option value="">Select State</option>');
                        $.each(response.districts,function(index, val){
                            $('#districts').append('<option value=" '+val.id+' "> '+val.name+' </option>')
                        });
                        
                    }
                });
            });
        });
    </script>
@endsection