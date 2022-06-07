@extends('layouts.app')
@section('content')

<!--Add comment Modal -->
<div class="modal fade" id="AddcommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">   {{-- id is what is in html code written below--}}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="">name</label>
            <input type="text" class="name form-control">      {{-- this is taken in ajax--}}
        </div>
        <div class="form-group">
            <label for="">email</label>
            <input type="text" class="email form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_comment">Save</button>{{-- important--}}
      </div>
    </div>
  </div>
</div>
<!--end Add comment Modal -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="data"></div>
            <div class="card">
                <div class="card-header">
                    <h4>comments Data</h4>
                    <a href="#"  data-toggle="modal" data-target="#AddcommentModal" class="btn btn-info">Add comment</a>     
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click','.add_comment',function(e){        // no any codes and semicolon inside function
            e.preventDefault();
           
            var data={
                'name':$('.name').val(),
                'email':$('.email').val()
            }
            //  console.log(data);             //can also use alert
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        
        $.ajax({
           type:'post' ,
           url:"/comments",
           data:{},     
           dataType:"json",   
           success: function(response)
           {
                $("#data").html(response);
           },
           error: function(response)
           {
               alert('error occured');
           }

           
           
          
        });

    });
    
</script>
@endsection
