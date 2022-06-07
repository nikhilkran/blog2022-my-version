@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h3 class="m-2">Edit Comment</h3>
        <div class="card-body">
            <form action="{{route('cmnt_update',$cmnt->id)}}" method="post" >
                @csrf()
                @method('put')
                
                        <div class="row">
                            <label>Choose Blogs</label>&emsp;
                            <select class=" js-example-basic-single form-select col-5" name="blog"  aria-label="Default select example">
                                <option selected disabled>---select category---</option>  
                                @foreach($blogs as $blog)
                                <option @if($cmnt->blog_id == $blog->id) selected @endif
                                value="{{$blog->id}}">{{$blog->name}}
                                </option>  
                                @endforeach
                            </select>             
                            @error('category')
                            <span class='text-danger'>{{$message}}</span>
                            @enderror 
                        </div>
                            <br>
                       
                        <div class="row">
                            <label>Comment</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <textarea class="form-group col-md-7" name="comment" placeholder="write content here " >{{$cmnt->comment}}</textarea>
                            @error('content')
                                <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                      
                </div>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection