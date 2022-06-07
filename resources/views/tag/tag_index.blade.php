@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tag list<span><a href="/tags/create" target="blank" title="create tag">+</a></span></h3>
    <div class="card">
        <div class="card-body">
            <div class="table table-bordened">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>description</th>
                            <th>Blogs</th>
                           
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->description}}</td>
                            <td>
                                @foreach($tag->blogs as $blog)        {{-- note:- focus on blogs--}}
                                {{$blog->name}}
                                @endforeach
                            </td>
                           
                            <td>
                                @if(auth::user())
                                <div class="row ml-1">
                                    <a class="btn btn-primary" href="/tags/edit/{{$tag->id}}" target="blank" title="edit tag">edit</a>&emsp;
                                    <form action="/tags/delete/{{$tag->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" title="delete tag">delete</button>&emsp;
                                    </form>
                                    <a class="btn btn-info" href="/tags/show/{{$tag->id}}" target="blank" title="view tag">view</a>&emsp;
                                </div>
                                @endif
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
                {{$tags->links()}}
            </div>
        </div>
        <a href="/tags/soft_deletes" target="blank">view softdeleted tags</a>
    </div>
</div>
@endsection





