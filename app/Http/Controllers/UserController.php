<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:hr|account|staff']);
    }


    public function dashboard()
    {
        $entry_time_max_id = DB::table('entry_times')->max('id');
        $entry_time = DB::table('entry_times')->select('entry_last_time')->where('id', $entry_time_max_id)->get();

        return view('user.dashboard', compact('entry_time'));
    }
}
