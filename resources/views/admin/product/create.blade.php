@extends('backend.index')
@section('title','product Create')
@section('linh')
    <div class="container">
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            <h3>Add product</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name's product">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="images" id="images" class="form-control" placeholder="Name's product">
                        @error('images')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-select"  name="category_id"  aria-label="Default select example">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}" {{old('category_id') == $item->id ? 'check':''}} > {{ $item->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
                        </div>
                    </div>
                    <h1></h1>
                    <div class="form-group">
                        <label for="" style="padding-top: 10px">Status</label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="stocking" checked>
                           Stocking
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="" value="out of stock">
                            Out of stock
                        </label>
                    </div>
                    <br>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Sale</label>
                        <input type="text" name="sale_price" class="form-control" value="0" placeholder="Name's product">
                        @error('sale_price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" name="quatity" value="{{old('quatity')}}" class="form-control" placeholder="Name's product">
                        @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="summary"></textarea>
                        </div>
                    </div>
                    <h1></h1>
                    <div class="form-group">
                        <label for="" style="padding-top: 10px">Status</label>
                        <br>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value=" " checked>
                            Pink
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="2" >
                            Blue
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="3" >
                            white
                        </label>
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="color" id="" value="4" >
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