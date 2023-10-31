<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container ">
    
    <a class="navbar-brand" href="{{route('home')}}">
    <img src="{{url('')}}/assets/imgs/logo.jpg" alt="" srcset="">    
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="{{route('home')}}">HOME</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">SEVICE</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{route('shop')}}">SHOP</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('blog')}}">BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">CONTACT</a>
        </li>
      </ul>
      
      {{-- <div class="btn-group dropstart">
        <button type="button" style="border: none" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-shopping-bag icon"></i>
        </button>
        <ul class="dropdown-menu">
          <!-- Dropdown menu links -->
        </ul>
      </div> --}}
      
      <div class="btn-group dropstar" >
        <button class="btn dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-shopping-bag icon"></i>
        </button>
        @php
            $total = 0
        @endphp
        @foreach ((array)session('cart') as $id => $item)
            @php
                $total += $item['price'] * $item['quatity']
            @endphp

        @endforeach

        <ul class="dropdown-menu " style="width: 300px">
          <li>
            <div class='minicart--item-container'>
                You have
                <span class='minicart--item-count' > <span class="fw-bold">{{count((array) session('cart'))}}</span> items</span>
                in your cart!
              </div>  
            </li>
          <hr>
          <li>
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @if (session('cart'))
                  @foreach (session('cart') as $id => $item)
                  <tr>
                    <td scope="row">
                      <img src="{{url('uploads')}}/{{$item['images']}}" alt="" width="100px" height="100px">
                    </td>
                    <td>
                      <h6>
                        {{$item['name']}}
                      </h6>
                      <p>
                        <span style="color: brown">$</span>{{$item['price']}} 
                      </p>
                      <p>
                        Quantity: {{$item['quatity']}}
                      </p>

                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </li>
              
          <li>Total Price: {{$total}} </li>
          <li>
            <div class="btn btn-ouline-primary cart-mini">
              <a class="dropdown-item " href="{{route('cart')}}">View Cart</a>
            </div>
          </li>
        </ul>
      </div>
        <div class="box">
            <form name="search">
                <input type="text" class="input" name="txt" onmouseout="this.value = ''; this.blur();">
            </form>
            <i class="fas fa-search"></i>
        </div>
        <div class="pl-5">
          <div class="vr"></div>
        </div>
        @if (Auth::check())
            <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" style="color: rgb(42, 42, 42); background-color: white; border: none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </button>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href={{route('logout')}} class="dropdown-item" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Log Out
                  </a>
                </form>
              </li>
            </ul>
          </div>
        @else
          <a href="{{route('login')}}" class="pl-5">
              <i class="fas fa-user icon "></i>
          </a>
        @endif

        
        {{-- <div class="pl-5 position-relative">
            <a href="{{route('cart')}}" class="">
              <i class="fas fa-shopping-bag icon"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{count((array) session('cart'))}}
              </span>
          </a>
        </div> --}}

      </div>


    </div>
  </div>
</nav>