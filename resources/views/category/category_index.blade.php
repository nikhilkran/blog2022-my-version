@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Category List<span><a href="/categories/create" target="blank" title="create blog">+</a></sapn></h3>
    <div id="data"></div>  {{-- since we required ajax at this location--}}
    <div class="card">
        <div class="card-body">
            <div class="table table-bordered ">
                <table class="table">  {{-- MISTAKE TABLE CLASS NOT DIV CLASS--}}
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Decription</th>
                            <th>created at</th>

                            <th>blogs</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)                               {{-- mistake same name have to used in controller with function--}}
                        <tr>
                            <td>{{$category->id}}</td>                                   {{-- mistake of td instead of tb--}}
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->created_at}}</td>                            {{--vvvimp mistake same name as in db--}}
                            <td>
                            
                                @foreach($category->blogs as $blog)  
                                    {{$blog->name}}
                                @endforeach
                            </td>
                            
                            <td>
                                @if(auth::user())
                                <div class="row ml-1">
                                    <a class="btn btn-primary" href="/categories/edit/{{$category->id}}" target="blank" title="edit category">Edit</a>&emsp;    {{-- mistake while passing route in href we have to pass id for particular category--}}
                                    <form action="/categories/delete/{{$category->id}}" method="post">                     {{-- here method post is by default fixed thing--}}
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" title="Delete category">Delete</button>&emsp;  {{-- think for submit i,e why form used--}}
                                    </form>
                                    <a class="btn btn-info" href="#"  onclick="showcategory({{$category->id}})" title="view category" >View</a>&emsp;    {{-- removed target="blank"--}}
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
        <a href="/categories/soft_deletes" target="blank">view soft deleted categories</a>
    </div>
<div>
    
<script>
    function showcategory(id)
    {
        $.ajax({
           type:'get' ,
           url:"/categories/show/"+id,
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
