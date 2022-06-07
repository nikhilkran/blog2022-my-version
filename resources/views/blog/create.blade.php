@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <h3 class="m-2">New Blog</h3>   {{-- m represnts margin all around from other box lying above or below it--}}
        <div class="card-body">
            <form action="{{route('b_store')}}" method="post" enctype="multipart/form-data">  {{-- enctype is required when we add file--}}
                @csrf()
                @method('post')
                
                    <div class="row">
                        <label >Title</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input type="text" class="form-control col-md-5 " name="name" placeholder="title of the blog"> {{--form-group or form-control is for adding styling to forms/classes i,e bootstrap--}}
                       
                        @error('name')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div>
                    <br><br>

                    <div class="row">
                        <label>Choose Categories</label>&emsp;
                        <select class=" js-example-basic-single form-select col-5" name="category"  aria-label="Default select example">
                            <option selected disabled>---select category---</option>  {{-- doubt?--}}
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>  {{--here in option tag value attribute we have passed id since we are handling through id--}}
                            @endforeach
                        </select> 

                        @error('category')                                               {{--for validation message--}}
                        <span class='text-danger'>{{$message}}</span>
                        @enderror 
                    </div>
                    <br> {{-- no closing tag required--}}

                    <div class="row">
                        <label>Choose Tags</label>&emsp;&emsp;&emsp;&emsp;
                        <select class="js-example-basic-multiple form-select col-5" name="tags[]" multiple="multiple"   aria-label="Default select example">
                            <option disabled>---select tags---</option>
                            @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>  
                            @endforeach
                        </select>

                        @error('tags')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                    </div><br>

                    <div class="row">
                        <label>Content</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <textarea class="form-group col-md-5" name="content" placeholder="write content here"></textarea>
                        
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