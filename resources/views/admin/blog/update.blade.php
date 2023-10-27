@extends('backend.index')
@section('title','Blog Create')
@section('linh')
    <div class="container">
        <form action="{{route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            @method('put')
            <h3>Add Blog</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name's product" value="{{$blog->name}}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Name's product">
                        <div class="pt-3">
                            <span>
                                <img src="/uploads/{{$blog->image}}" alt="" style="height: 200px; width: 150px;">
                            </span>
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                            <textarea class="form-control summary" id="exampleFormControlTextarea1"  rows="5" name="content">{{$blog->content}}</textarea>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    
                    
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Author</label>
                        <input type="text" name="author" value="{{$blog->author}}" class="form-control"  placeholder="Name's author">
                        @error('author')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Skill</label>
                        <select class="form-select"  name="skill_id"  aria-label="Default select example">
                            @foreach ($skill as $item)
                                <option value="{{ $item->id }}" {{old('skill_id') == $item->id ? 'check':''}} > {{ $item->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tag</label>
                        <input type="text" name="tag" value="{{$blog->tag}}" class="form-control" placeholder="Tag">
                        @error('tag')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Summary</label>
                            <textarea class="form-control " rows="5" cols="8" name="summary">{{$blog->summary}}</textarea>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="" style="padding-top: 10px">Size</label>
                                <br>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="size" value="1" {{$blog->size == 1 ? 'checked' : ''}}>
                                    Big
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="size" value="2" {{$blog->size == 2 ? 'checked' : ''}}>
                                    Smaill
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group">
                                <label for="" style="padding-top: 10px">Status</label>
                                <br>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="" value="true" {{$blog->status == 'true' ? 'checked' : ''}}>
                                    True
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status" id="" value="flase" {{$blog->status == 'true' ? 'checked' : ''}}>
                                    Flase
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1></h1>
            
            
            <button class="btn btn-secondary" type="Submit">Submit</button>
        </form>
    </div>
@endsection