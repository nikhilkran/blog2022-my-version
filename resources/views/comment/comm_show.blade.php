{{--@extends('layouts.app')
@section('content')--}}
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row form-group">
                <label class="col-md-2">Show Comment</label>
                <input class="col-md-2 form-control" type="text" name="name" placeholder="comment name" value="{{$comment->name}}" readonly required>
            </div>
            <div class="row form-group">
                <label class="col-md-2">Show Email</label>
                <textarea class="col-md-2 form-control" type="text" name="name" placeholder="email">"{{$comment->email}}"</textarea>
            </div>
        </div>
    </div>
</div>
{{--@endsection--}}