@extends('layout.adminLayout')

@section('content')

<div class="container">
   <div class="row">
       <div class="col-sm-12">
           <div class="card">
               <div class="card-header">
                   <div class="card-title">Subscription List</div>
               </div>

               <div class="card-body">
                   <table class="table table stripped" id="subscriptionList">
                       <tbody>
                           <tr>
                               <th>Number</th>
                               <th>Subscriber Name</th>
                               <th>Email</th>
                           </tr>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>

<script>
$(document).ready( function () {
    $('#subscriptionList').DataTable({
        ajax : {
            url : '/subscriber-list',
            dataSrc : 'subscribers'
        },
        columns : [
            { data : 'id'},
            { data : 'name'},
            { data : 'email'},
        ]
    });
});
</script>
@endsection