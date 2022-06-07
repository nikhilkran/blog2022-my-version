{{--@extends('layouts.app')
@section('content')--}}
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{route('c_store')}}" method="post">                                                                         {{-- mistake of {{}} wahtever we ahve to pass we need to pass in it--}}
                @csrf
                @method('post')
                <div class="row form-group">
                    <label class="col-md-2">Name</label>
                    <input class="col-md-2 form-control"  type="text" name="name"  placeholder="enter comment name" required>
                    @error('email')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror   
                </div>
                
                <div class="row form-group">
                    <label class="col-md-2">Email</label>
                    <textarea class="col-md-2 form-control" type="text" name="email" placeholder="enter email here" ></textarea>
                    @error('email')
                        <span class='text-danger'>{{$message}}</span>
                    @enderror   
                </div>
                <button type="submit" class="btn btn-info" >Save</button>
            </form>
        </div>
    </div>
</div>
{{--@endsection--}}