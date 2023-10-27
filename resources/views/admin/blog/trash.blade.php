@extends('backend.index')
@section('title','blog')
@section('linh')            
    <div class="container">
        <form action="">
            <div class="row pb-2 pt-2">
                <div class="col-lg-7">
                    <a href="{{route('blog.index')}}" class="btn btn-success">
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
                            <a href="{{route('blog.restore',$item->id)}}" class=""><ion-icon name="enter-outline" class="button-icon-update"></ion-icon></a>
                            <a href="{{route('blog.delete',$item->id)}}" ><ion-icon name="trash-bin-outline" class="bin-outline"></ion-icon></a> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$blog->appends(request()->all())->links() }}
    </div>          

@endsection
