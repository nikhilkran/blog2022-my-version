@extends('layouts.app')
@section('content')
<div class="container">
    <h3>tag show</h3>
    <div class="card">
        <div class="card-body">
            <div class="row form-group">
                <label class="col-md-2">tag name</label>
                <input class="col-md-4 form-control" value="{{$tag->name}}" type="text" name="name" placeholder="tagname" readonly required>
            </div>
            <div class="row form-group">
                <label class="col-md-2">tag description</label>
                <textarea class="col-md-4 form-control" type="text" name="name" placeholder="tagdescription" readonly required>{{$tag->description}}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection