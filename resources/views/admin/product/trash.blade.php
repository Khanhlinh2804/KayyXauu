@extends('backend.index')
@section('title','Product')
@section('linh')            
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="col-lg-7">
                    <a href="{{route('category.index')}}" class="btn btn-success">
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
        @if (session('error'))
            <div class="aleat-success">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('error') }}
                    </strong>
                </div>
            </div>           
        @endif
        <h3>List trash</h3>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Sale</th>
                <th scope="col">Quantity</th>
                <th scope="col">Color</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{url('uploads')}}/{{$item->images}}" style="width: 120px;
                                height: 150px;" alt="">
                        </td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->sale_price}}</td>
                        <td>{{$item->quatity}}</td>
                        <td>{{$item->color}}</td>
                        <td>{{$item->category_id}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                           <a href="{{route('product.restore',$item->id)}}" class=""><ion-icon name="enter-outline" class="button-icon-update"></ion-icon></a>
                            <a href="{{route('product.delete',$item->id)}}" ><ion-icon name="trash-bin-outline" class="bin-outline"></ion-icon></a> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$product->appends(request()->all())->links() }}
    </div>          

@endsection
