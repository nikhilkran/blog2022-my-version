@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Comment List<span><a href="#" onclick="creatComment()" title="create new comment" >+</a></span></h3>   {{-- sometimes create collapse so use other spelling in function--}}
    <div id="insertdata"></div>               {{-- for to show create ajax here--}}
    <div class="card">
        <div class="card-body">
               <div class="table table-bordered">   {{-- first table table-bordened comes--}}
                        <table class="table">       {{-- mistake of table class--}}
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>ACTION</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)           {{-- $comment is local variable hence name can be anything--}}
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->name}}</td>
                                    <td>{{$comment->email}}</td>
                                    
                                    <td>
                                        <div class="row ml-1">              {{-- MISTAKE:- 1. See div is closed containing all things 2. no space between row and ml-1--}}
                                            <a class="btn btn-info" href="#" onclick="editComment({{$comment->id}})" title="edit category">Edit</a>&emsp;   {{-- &emsp; is used for to give space horizontally--}}
                                            <form action="{{route('c_delete',$comment->id)}}" method="post">
                                                @csrf()
                                                @method('delete')
                                                <button type="submit" class="btn btn-info" title="delete category" target="blank">Delete</button>&emsp;     {{-- since not given any name by $request than also using form--}}
                                            </form>
                                            <a class="btn btn-info" href="#" title="show category" onclick="showComment({{$comment->id}})">Show</a>&emsp;
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
   function showComment(id)
    {
        $.ajax({
           type:'get',
           url:"/comments/show/"+id,                           // Important:-same thing as that of route if we pass in terms of name them it should come in {{}}
           data:{},                                           //when we send data in request
           success: function(response)
           {
                $("#insertdata").html(response);
           },
           error: function(response)
           {
               alert('error occured');
           }
        });
    }

    function editComment(id)
    {
        $.ajax({
            type:'get',
            url:'/comments/edit/'+id,
            data:{},
            success: function(response)      // Mynote:- response is one argument  + argument need not to be define separately as that of variable + not come in quotes
            {
                $("#insertdata").html(response);       // setting html at data id
                // alert('success');             // alert is for alert show
            },
            error: function(response)            // Important:- if some error occur we will see here
            {
                alert('some error occured!');    
            }
        });
    }

    function creatComment()
    {
        $.ajax({
            type:'get',
            url:"/comments/create/",
            success: function(response)
            {
                $("#insertdata").html(response);
                // alert('success');
            },
            error: function(response)
            {
                alert('some error occured!');
            }
        });
    }

    

</script>
@endsection                                                {{-- forget to close endsection--}}