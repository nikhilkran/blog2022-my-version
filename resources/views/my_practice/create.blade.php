@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Create Comment</h3>
    <div class="card">
        <div class="card-body">
            <form action="/comments/store" method="post">
                @csrf
                @method('post')
                <div class="row form-group">
                    <label class="col-md-2" >Comment Name</label>
                    <input class="col-md-2 form-control" type="text" name="name" placeholder="comment name" required>
                    @error('name')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror          
                </div>
                <div class="row form-group">
                    <label class="col-md-2" >Comment Email</label>
                    {{--<input class="col-md-4 form-control" type="text" name="email" placeholder="category description" required>--}}
                    <textarea class="col-md-2 form-control" type="text" name="email" placeholder="category description"></textarea>
                    @error('email')
                        <span class='text-danger'>{{$message}}</span>  
                    @enderror    
                </div>
                <button class="btn btn-info">save</button>
            </form>
        </div>
    </div>
<div>   
@endsection
