@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <h3 class="m-2">Show Cmnt</h3>
        <div class="card-body"> 
            <div class="card-body row">
                <div class="col-8">
                   
                    <div class="row">
                        <label>blog</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                        <input type="text" class="form-control col-md-7 " value="{{$cmnt->blog->name}}" placeholder="blog of the comment" readonly> 
                    </div>
                    <div class="row">
                        <label>Comment</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                        <textarea class="form-group col-md-7"  placeholder="write content here" readonly>{{$cmnt->comment}}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <img src="{{asset($cmnt->file_path)}}"width="200" height="auto" alt="cmnt image">
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection