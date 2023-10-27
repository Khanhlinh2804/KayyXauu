@extends('backend.index')
@section('title','blog')
@section('linh')            
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="d-flex">

                    <div class="col-lg-1">
                        <a href="{{route('blog.create')}}" class="btn btn-success">
                            <ion-icon name="duplicate-outline" class="icon-add"></ion-icon>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{route('blog.trashed')}}" class="btn btn-danger">
                            <ion-icon name="trash-outline" class="icon-add"></ion-icon>
                        <a>
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
            </div>
        </form>
        @if (session('success'))
            <div class="aleat-success">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        {{ session('success') }}
                    </strong>
                </div>
            </div>           
        @endif
        <h3>List</h3>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Author</th>
                <th scope="col">Tag</th>
                <th scope="col">Size</th>
                <th scope="col">Skill</th>
                <th scope="col">Summary</th>
                {{-- <th scope="col">Content</th> --}}
                <th scope="col">Status</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="{{url('uploads')}}/{{$item->image}}" style="width: 120px;
                                height: 150px;" alt="">
                        </td>
                        <td>{{$item->author}}</td>
                        <td>{{$item->tag}}</td>
                        <td>
                            @if ($item->size==1)
                                Big
                            @else
                                Small
                            @endif 
                        </td>
                        <td>{{$item->skill->name}}</td>
                        <td>{{$item->summary}}</td>
                        {{-- <td>{{$item->content}}</td> --}}
                        <td>
                            @if ($item->status == 'true')
                                <span >Active </span>
                            @elseif($item->color == 'false')
                                <span >No Active</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{route('blog.destroy',$item->id)}}" method="post">
                                <a href="{{route('blog.edit',$item->id)}}" class="button-icon-update"><ion-icon name="create-outline" class="icon-delete"></ion-icon></a>
                                @method('delete')
                                @csrf
                                <button type="submit" class="button-icon-delete"><ion-icon name="close-outline" class="icon-delete"></ion-icon></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$blog->appends(request()->all())->links() }}
    </div>          

@endsection
