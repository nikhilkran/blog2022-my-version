@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Create Category</h3>
    <div class="card">
        <div class="card-body">
            <form action="/categories/store" method="post">    {{-- note:- here url given in form--}}
                @csrf
                @method('post')
                <div class="row form-group">
                    <label class="col-md-2" >Category Name</label>
                    <input class="col-md-2 form-control" type="text" name="name" placeholder="category name" required>  {{-- TRICK c vs c comes--}}
                    @error('name')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror          
                </div>
                <div class="row form-group">
                    <label class="col-md-2" >Category Description</label>
                    {{--<input class="col-md-4 form-control" type="text" name="description" placeholder="category description" required>--}}
                    <textarea class="col-md-2 form-control" type="text" name="description" placeholder="category description"></textarea>
                    @error('description')
                        <span class='text-danger'>{{$message}}</span>  
                    @enderror    
                </div>
                <button class="btn btn-info">save</button>
            </form>
        </div>
    </div>
<div>   
@endsection
