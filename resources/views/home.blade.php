@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <a  class="col-md-2 btn btn-info" href="/categories/index" target="blank" title="all categories">Categories</a>  {{-- journey starts from here!--}}
                    <a  class="col-md-2 btn btn-secondary" href="/tags/index" target="blank" title="all tags">Tags</a>
                    <a  class="col-md-2 btn btn-primary" href="{{route('b_index')}}" target="blank" title="all blogs">Blogs</a>
                    <a  class="col-md-2 btn btn-success" href="{{route('c_index')}}" target="blank" title="all comments">Comments</a>
                    <a  class="col-md-2 btn btn-success" href="{{route('cmnt_index')}}" target="blank" title="all cmnts">cmnts</a>
                    <a  class="col-md-2 btn btn-success" href="/mytask1" target="blank" title="">Task1</a>
                    <a  class="col-md-2 btn btn-success" href="/mytask1map" target="blank" title="">Task1map</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
