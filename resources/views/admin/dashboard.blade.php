@extends('admin.layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col offset-md-1">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h1>Today's Total Lunch</h1>
                    <h3>{{$today->toDayDateTimeString()}}</h3>
                </div>

                <div class="card-body">
                    <h1 style="text-align: center;font-weight: bold;">23</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col  offset-md-1">
            <div class="card">
                <div class="card-header" ">
                    <p style="float: left">User List</p>
                <p style="float: right">Total User: {{count($users)}}</p>

                <!-- Large modal -->
                   <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Add New User</button>

                   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                       <div class="modal-content">
                         <h1>New User Form</h1>

                       </div>
                     </div>
                   </div>

                </div>

                <div class="card-body">
                    @php
                        $i=1;
                    @endphp
                    <table class="table table-striped">
                       <thead>
                         <tr>
                           <th scope="col">No</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Created</th>
                           <th scope="col">Action</th>
                         </tr>
                       </thead>
                       <tbody>
                        @foreach ($users as $user)
                         <tr>
                           <th scope="row">{{$i++}}</th>
                         <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                           <td>
                               <button type="button" class="btn btn-primary">Edit</button>
                               <button type="button" class="btn btn-danger">Delete</button>
                           </td>
                         </tr>
                         @endforeach
                       </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
