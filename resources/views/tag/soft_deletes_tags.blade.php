@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Tag List</h3>
    <div class="card">
        <div class="card-body">
            <div class="table table-bordered ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Decription</th>
                            <th>Created at</th>
                            <th>updated at</th>
                            <th>deleted at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->description}}</td>
                            <td>{{$tag->created_at}}</td>
                            <td>{{$tag->updated_at}}</td>
                            <td>{{$tag->deleted_at}}</td>
                            <td>
                                
                                    @if(auth::user())
                                    <a href="/tags/restore/{{$tag->id}}" class="btn btn-warning">Restore</a>&emsp;
                                    
                                    <form action="/tags/delete/{{$tag->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" title="Delete category">Delete</button>&emsp;
                                    </form>
                                    <a class="btn btn-info" href="/tags/show/{{$tag->id}}" target="blank" title="view category" >View</a>&emsp;
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div>
@endsection