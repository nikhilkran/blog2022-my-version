@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h3 class="m-2">New Comment</h3>   {{-- m represnts margin all around from other box lying above or below it--}}
        <div class="card-body">
            <form action="{{route('cmnt_store')}}" method="post" enctype="multipart/form-data" >  {{-- enctype is required when we add file--}}
                @csrf()
                @method('post')
                
                   
                    

                    <div class="row">
                        <label>Choose Blogs</label>&emsp;
                        <select class=" js-example-basic-single form-select col-5" name="blog"  aria-label="Default select example">
                            <option selected disabled>---select category---</option>  {{-- doubt?--}}
                            @foreach($blogs as $blog)
                            <option value="{{$blog->id}}">{{$blog->name}}</option>  {{--here in option tag value attribute we have passed id since we are handling through id--}}
                            @endforeach
                        </select> 

                        @error('category')                                               {{--for validation message--}}
                        <span class='text-danger'>{{$message}}</span>
                        @enderror 
                    </div>
                    <br>

                    

                    <div class="row">
                        <label>Comment</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <textarea class="form-group col-md-5" name="comment" placeholder="write content here"></textarea>
                        
                        @error('content')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <label>Add Image</label>&emsp;&emsp;&emsp;&emsp;
                        <input type="file" name="image" >
                    </div>

                    
                
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection