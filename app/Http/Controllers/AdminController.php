<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:superadmin']);
    }


    public function dashboard()
    {
        $users =DB::table('users')->get();

        $today = Carbon::now();
        return view('admin.dashboard', compact('today','users'));
    }

}
