@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('c_update')}}" method="post">         {{-- mistake of {{}} wahtever we ahve to pass we need to pass in it--}}
                @csrf
                @method('put')
                <div class="row form-group">
                    <input type="hidden" value="{{$comment->id}}" name="id">  {{-- error of non-object comes 1. not used id in route 2. trying before filling up update function in controller--}}
                   <label class="col-md-2">Comment Name</label>
                   <input class="col-md-2 form-control" type="text" name="name" placeholder="input comment name" value="{{$comment->name}}"required>

                </div>
                <div class="row form-group">
                    <label class="col-md-2">Email</label>
                    <textarea class="col-md-2 form-control" type="text" name="email" placeholder="input email address" >{{$comment->email}}</textarea>
                </div>
                <button type="submit" class="btn btn-info">Update</button>

                
            </form>
        </div>
    </div>
</div>
@endsection