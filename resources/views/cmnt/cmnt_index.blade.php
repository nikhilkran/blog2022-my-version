@extends('layouts.app')
@section('content')
<div class="container">
<div class="card">
    <div class="card-body">
        <h3 >Comments<a href="{{route('cmnt_create')}}"  title="create comment" target="blank">+</a></h3>
        <div id="createdata"></div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Comment</th>
                    <th>Blog</th>             {{-- can take blog only--}}
                    <th>User_Id</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($cmnts as $cmnt)
                <tr>
                    <td>{{$cmnt->id}}</td>
                    <td>{{$cmnt->cmnt}}</td>
                    <td>{{$cmnt->blog->name}}</td>
                    <td>{{$cmnt->user_id}}</td>
                    <td>
                        <div class="row ml-1">
                            <a class="btn btn-primary" href="/cmnts/edit/{{$cmnt->id}}" target="blank" title="edit comment">Edit</a>&emsp;
                            
                            <form action="{{route('cmnt_delete',$cmnt->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" value="{{$cmnt->id}}" name="blog_id">
                                <button type="submit" class="btn btn-danger" title="Delete cmnt">Delete</button>&emsp;
                            </form>
                            
                            {{--<a class="btn btn-info" href="/blogs/show/{{$blog->slug}}" target="blank" title="view blog">View</a>&emsp;--}}
                        
                            <a class="btn btn-info" href="{{route('cmnt_show',$cmnt->slug)}}"  title="view cmnt" >View</a>&emsp;   {{-- MISTAKE since we are using slag as variable which is of string (varchar)type hence we have to pass as string i,e in single quodes or double codes --}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection