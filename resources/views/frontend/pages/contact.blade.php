@extends('frontend.index')
@section('title','Contact')
@section('content')
<div class="shop-img">
    <img src="{{url('')}}/assets/imgs/1942.png" alt="">
    <p>Contact Us</p>
</div>
<div class="container">
    <div class="row">
        @if (session('success'))
            <div class="aleat-success">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('success') }}
                    </strong>
                </div>
            </div>           
        @endif
        <h3 class="pt-5">Leave us a message</h3>
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
            <form action="{{route('contact')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group contact" >
                            <input type="text" name="name" class="form-control" placeholder="Fist Name">
                            @error('name')
                                <p class="text-danger">{{ $messages }}</p>
                            @enderror
                        </div>
                        <div class="form-group contact" >
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            @error('email')
                                <p class="text-danger">{{ $messages }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group contact" >
                            <input type="text" name="full" class="form-control" placeholder="Last Name">
                            @error('full')
                                <p class="text-danger">{{ $messages }}</p>
                            @enderror
                        </div>
                        <div class="form-group contact" >
                            <input type="text" name="phone" class="form-control" placeholder="Phone">
                            @error('phone')
                                <p class="text-danger">{{ $messages }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3 pt-5 contacts">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note"
                            placeholder="Message" ></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="contact-submit">Submit</button>
            </form>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <div class="pb-5">
                <div class="contact-icon">
                    <i class="fas fa-map-pin"></i>
                    <p>553 Truong Dinh Street, Hai Ba Trung, Hanoi</p>
                </div>
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                    <p>0986797018</p>
                </div>
                <div class="contact-icon">
                    <i class="far fa-envelope"></i>
                    <p>khanhlinh6863@gmail.com</p>
                </div>
            </div>
            <div class="pt-5">
                <h3>FOLLOW US</h3>
                <div class="contact-follow">
                    <a href="https://www.facebook.com/klyngg/">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/k.lyyngg/">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <h1 style="text-align: center" class="pt-5 pb-5">Location</h1>
    <div class="row pb-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.255886059425!2d105.84084747942852!3d20.982377439513083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac4231003afd%3A0xc93a59ea235302d2!2zNTUzIFRyxrDGoW5nIMSQ4buLbmgsIEdpw6FwIELDoXQsIEhvw6BuZyBNYWksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1697113129107!5m2!1svi!2s"
             width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-5 contact-boder">
            <div class="d-flex">
                <div class="contact-text">
                    <h3>Location :</h3>
                    <p>553 Truong Dinh Street, Hai Ba Trung, Hanoi</p>
                </div> 
                <img src="{{url('')}}/assets/imgs/5.png" alt="" style="width:300px; height: 50%; ">
            </div>
            <div class="d-flex">
                <img src="{{url('')}}/assets/imgs/5.png" alt="" style="width:300px; height: 235px; ">
                <div class="contact-text">
                    <h3>Opending hours</h3>
                    <p>Every day of the week :</p>
                    <p>Morning: 8am-12am</p>
                    <p>Afternoon: 1pm-6pm</p>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection