{{--@extends('layouts.app')
@section('content')--}}
<div class="container">
    <h3>Edit Category</h3>
    <div class="card">
        <div class="card-body">
            <form action="/categories/update" method="post">
                @csrf
                @method('put')
                <div class="row form-group">
                    <input type="hidden" value="{{$category->id}}" name="id">
                    <lable class="col-md-2" >Category Name</lable>
                    <input  class=" col-md-4 form-control " value="{{$category->name}}"type="text" name="name" placeholder="category name" required>  {{-- note:- value is what we have created already since it is coming i,e we are not inputing hence passed as string i,e in double codes --}}
                    @error('name')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror
                </div>
                <div class="row form-group">
                    <lable class="col-md-2" >Category Description</lable>
                    <textarea class=" col-md-4 form-control "type="text" name="description" placeholder="category description" >{{$category->description}}</textarea>
                    @error('description')
                        <span class='text-danger'>{{$message}}</span>  
                    @enderror   
                </div>
                <button type="submit" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
<div>
{{--@endsection--}}