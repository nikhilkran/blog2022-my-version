@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Blog List<span><a href="/blog/create" target="_blank" title="create blog">+</a></span></h3>
    <div class="row">
        <div class="col"></div>
        <div class="col-md-4">
            <form class="pt-1" action="" method="get">
                    <input type="text" placeholder="Search Blog" name="searchBN" value="{{$search}}">&nbsp;
                    <button type="submit" class="btn btn-outline-info">Go</button>
            </form>
        </div>
    </div>
    <div id="data"></div>
        <div class="card">
            <div class="card-body">
                <div class="table ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Decription</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->name}}</td>
                                <td>{{$blog->content}}</td>
                                <td>{{$blog->category->name}}</td>   {{-- IMPORTANTNOTE:- but we have not used category_id (because it is bydefault fetch full category and then name of respective category--}}
                                <td>
                                    @foreach($blog->tags as $tag)
                                    <span class="badge badge-warning">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="row ml-1">
                                        @if($blog->deleted_at)
                                            <a class="btn btn-warning" href="{{route('b_restore',$blog->id)}}" title="restore blog">Restore</a>&emsp;
                                        @else
                                            <a class="btn btn-primary" href="/blogs/edit/{{$blog->id}}" target="blank" title="edit blog">Edit</a>&emsp;
                                        @endif
                                        <form action="{{route('b_delete')}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                            <button type="submit" class="btn btn-danger" title="Delete blog">Delete</button>&emsp;
                                        </form>
                                        
                                        {{--<a class="btn btn-info" href="/blogs/show/{{$blog->slug}}" target="blank" title="view blog">View</a>&emsp;--}}
                                    
                                        <a class="btn btn-info" href="#" onclick="showblog('{{$blog->slug}}')" title="view blog" >View</a>&emsp;   {{-- MISTAKE since we are using slag as variable which is of string (varchar)type hence we have to pass as string i,e in single quodes or double codes --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$blogs->links()}}      {{-- checkout does it used for pagination--}}
            </div>
            @if(! ($type??''))           {{-- for to remove other page excess things--}}
                <a href="{{route('b_soft')}}" target="_blank">view softdeleted blogs</a>
            @endif
        </div>
    
</div>

<script>
    function showblog(slug)
    { 
        $.ajax({
           type:'get' ,
           url:"/blogs/show/"+slug,
           data:{},     //when we send data in request
           success: function(response)
           {
                $("#data").html(response);
           },
           error: function(response)
           {
               alert('error occured');
           }
        });
    }
</script>
@endsection