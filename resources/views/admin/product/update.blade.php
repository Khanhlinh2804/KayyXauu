@extends('backend.index')
@section('title','Product Update')
@section('linh')
    <div class="container">
        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('put')
            <h3>Edit product</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Name's product">
                        @error('name')
                            <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Image</label>
                        <br>
                        <input type="file" name="images" id="images" value="{{old('images') ?? $product->images}}" >
                        <div class="pt-3">
                            <span>
                                <img src="/uploads/{{$product->images}}" alt="" class="w-25">
                            </span>
                        </div>
                        @error('images')
                            <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <h1></h1>
                    <div class="form-group">
                        <label for="" style="padding-top: 10px">Status</label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="stocking" {{$product->status == 'stocking' ? 'checked' : ''}}>
                           Stocking
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" value="out of stock" {{$product->status == 'out of stock' ? 'checked' : ''}}>
                            Out of stock
                        </label>
                    </div>
                    <br>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-select"  name="category_id"  aria-label="Default select example">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{old('category_id') == $item->id ? 'check':''}} > {{ $item->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="price" class="form-control" value="{{old('price') ?? $product->price}}" placeholder="Price's product">
                        @error('price')
                            <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Sale</label>
                        <input type="text" name="sale_price" class="form-control" value="{{old('sale_price') ?? $product->sale_price}}" placeholder="Sale price product">
                        @error('sale_price')
                            <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="quatity" value="{{$product->quatity}}" class="form-control" placeholder="Name's product">
                        @error('quatity')
                            <p class="text-danger">{{ $messages }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="summary">{{$product->summary}}</textarea>
                        </div>
                    </div>
                    <h1></h1>
                    <div class="form-group">
                        <label for="" style="padding-top: 10px">Status</label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="1 " {{$product->color == 1 ? 'checked' : ''}} >
                            Pink
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="2" {{$product->color == 2 ? 'checked' : ''}} >
                            Blue
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="3" {{$product->color == 3 ? 'checked' : ''}} >
                            white
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="4" {{$product->color == 4 ? 'checked' : ''}} >
                            Black
                        </label>
                    </div>
                    
                </div>
            </div>
            <h1></h1>
            
            
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection