@extends('layout.adminLayout')

@section('content')

<div class="container">
   <div class="row">
       <div class="col-sm-12">
           <div class="card">
               <div class="card-header">
                   <div class="card-title">Please subscribe For Regular update about our events</div>
               </div>

               <div class="card-body">
                   <span id="success_msg" class="text-success"></span>
                   <form action="{{url('subscribe-action')}}" method="POST" id="subscription" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" class="form-control" id="name">
                          <span id="name_error" class="text-danger"></span>
                       </div>
                       <div class="form-group">
                          <label for="name">Email</label>
                          <input type="email" name="email" class="form-control" id="email">
                          <span id="email_error" class="text-danger"></span>
                       </div>
                       <div class="form-group">
                           <button type="button" id="submit" class="btn btn-success">Subscribe</button>
                       </div>
                   </form>
                   <div class="card-footer">
                       <dic class="card-text">
                           <span id="errors"></span>
                       </dic>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

<script>
$(document).ready( function () {
    $('#submit').on('click', function(e){
        e.preventDefault();
        
        var form = $("#subscription")[0];

        $.ajax({
            url : '/subscribe-action',
            method : 'POST',
            data : new FormData(form),
            dataType : 'json',
            contentType : false,
            cache : false, 
            processData : false,
            success : function(data){
                $("#name_error").html('');
                $("#email_error").html('');
                $("#success_msg").text('Subscription successful !');
                console.log(data);
            },
            error : function(data){
                $("#name_error").html(data.responseJSON.errors.name);
                $("#email_error").html(data.responseJSON.errors.email);
            }
        });
    });
});
</script>
@endsection