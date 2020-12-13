@extends('admin.layouts.admin')

@if (Session::has('message'))
                    <div class="alert alert-success">
                      {{Session::get('message')}}
                    </div>
@endif
                  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h1>Today's Total Lunch</h1>
                    <h3>{{$today->toDayDateTimeString()}}</h3>
                </div>

                <div class="card-body">
                    <h1 style="text-align: center;font-weight: bold;"><span class="badge badge-success">{{$total_lunch}}</span></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h2>Set Last Meal Entry Time</h2>
                </div>

                <div class="card-body">

                    <form  action="{{route('EntryTimeStore')}}" method="POST"  enctype="multipart/form-data">@csrf
                            <div class="form-group row">
                                <div class="col-sm-5">
                                <p>Current Time : {{$entry_time}}</p>
                                </div>
                                <div class="col-sm-5">
                                <label>Enter New Time</label>
                                <input type="time" class="form-control" name="entry_last_time" id="entry_last_time" Value=''>
                                </div>

                            </div>
                            <hr>
                            <div>
                            <button type="submit" id="submit" class="btn btn-primary" style="float: right;">Save New Entry Time</button>
                           </div>
                           </form>


                </div>
            </div>
        </div>
    </div>
</div>
<br><br>




<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-size: 25px; display: grid;grid-template-columns: auto auto auto;padding: 10px;">
                    <p>User List</p>
                <p>Total User: <span class="badge badge-danger">{{count($users)}}</span></p>

                <!-- Button trigger modal -->
                   <div style="display: flex;justify-content: center;">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                     Add New User
                   </button>
                   </div>

                   <!-- Modal -->
                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">New User From</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">

                         <form action="{{route('userStore')}}" method="POST"  enctype="multipart/form-data">@csrf
                            <div class="form-row">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">

                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">

                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">

                                <label>Role</label>
                                <select id="role" class="form-control" name="roles">
                                  <option selected>Choose User Role</option>
                                  <option value='2'>HR</option>
                                  <option value='3'>Accounts</option>
                                  <option value='4'>Staff</option>
                                </select>

                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save User Data</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           </div>
                           </form>

                        </div>


                       </div>
                     </div>
                   </div>

                </div>

                <div class="card-body">
                    @php
                        $i=1;
                    @endphp
                    <table class="table table-striped">
                       <thead style="text-align: center;">
                         <tr>
                           <th scope="col">No</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email</th>
                           <th scope="col">Created</th>
                           <th scope="col">Action</th>
                         </tr>
                       </thead>
                       <tbody style="text-align: center;">
                        @foreach ($users as $user)
                         <tr>
                           <th scope="row">{{$i++}}</th>
                         <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                           <td>
                              <button type="button" class="btn btn-primary">View</button>
                               <button type="button" class="btn btn-dark">Edit</button>
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
