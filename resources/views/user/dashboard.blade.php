@extends('user.layouts.user')

@section('script')
    <script>

    </script>
@endsection

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
                <h1>Welcome, {{Auth::user()->name}}</h1>
                    <h2>Apply For a Lunch</h2>
                </div>

                <div class="card-body">


                    <form action="{{route('mealStore')}}" method="POST"  enctype="multipart/form-data">@csrf
                            <div class="form-group row">

                                <div class="col-sm-5">
                                <label>User Name: {{Auth::user()->name}}</label>
                                <input type="hidden" class="form-control" name="user_id" id="guest_lunch" Value="{{Auth::user()->id}}">
                                </div>

                                <div class="col-sm-5">
                                <label>Select Date:</label>
                                <input type="date" class="form-control" name="lunch_date" id="date" value="<?php echo date('Y-m-d'); ?>"  />
                                </div>


                                <div class="col-sm-5">
                                <label>Select Lunch:</label>
                                <select id="role" class="form-control" name="lunch">
                                  <option value='0' selected>No</option>
                                  <option value='1'>Yes</option>
                                </select>
                                </div>

                                <div class="col-sm-5">
                                <label>Put Guest Lunch Number:</label>
                                <input type="number" class="form-control" name="guest_lunch" id="guest_lunch" Value='0'>
                                </div>

                            </div>
                            <hr>
                            <div>
                            <button type="submit" id="submit" class="btn btn-primary">Save Lunch</button>
                           </div>
                           </form>



                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection
