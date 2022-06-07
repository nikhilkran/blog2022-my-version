{{--@extends('layouts.app')
@section('content')--}}
<div class= "container">
    <h3> Show Category </h3>
    <div class ="card">
        <div class ="card-body">
            <div class="row form-group">
                <label class="col-md-2">category name</label>
                <input class="col-md-4 form control" value="{{$category->name}}" type="text" name="name" placeholder="categoryname" readonly required>{{-- readonly also comes here--}}
             </div>  
            <div class="row form-group">
                <label class="col-md-2">category description</label>
                <textarea class="col-md-4 form control" type="text" name="name" placeholder="categorydescription" readonly>{{$category->description}} </textarea>
            </div> 
        </div>
    </div>
</div>
{{--@endsection--}}



