@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Comment List<span><a href="/comments/create" target="blank" title="create blog">+</a></sapn></h3>
    <div id="data"></div>
    <div class="card">
        <div class="card-body">
            <div class="table table-bordered ">
                <table class="table">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Email</th>
                            <th>created at</th>
                            <th>updated at</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)                    
                        <tr>
                                                            
                            <td>{{$comment->name}}</td>
                            <td>{{$comment->email}}</td>
                            <td>{{$comment->created_at}}</td>                            
                            <td>{{$comment->updated_at}}</td>                            
                            
                            
                            <td>
                                @if(auth::user())
                                <div class="row-ml-1">
                                    <a class="btn btn-primary" href="/comments/edit/{{$comment->name}}" target="blank" title="edit comment">Edit</a>&emsp;    {{-- mistake while passing route in href we have to pass id for particular category--}}
                                    <form action="/comments/delete/{{$comment->name}}" method="post">                     {{-- here method post is by default fixed thing--}}
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" title="Delete comment">Delete</button>&emsp;
                                    </form>
                                    <a class="btn btn-info" href="#"  onclick="showcomment({{$comment->name}})" title="view comment" >View</a>&emsp; 
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach 
                    </tbody>
                </table>
               {{-- {{$categories->links()}} --}}
            </div>
        </div>
        {{--<a href="/categories/soft_deletes" target="blank">view soft deleted categories</a>--}}
    </div>
<div>

<script>
    function addcomment()
    {
        $.ajax({
           type:'get',
           url:"/comments/create/",
           data:{},     //when we send data in request
           success: function(data)
           {
                $("#data").html(data);
           },
           error: function(data)
           {
               alert('error occured');
           }
        });
    }
</script>
@endsection