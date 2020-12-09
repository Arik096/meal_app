<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:hr|account|staff']);
    }


    public function dashboard()
    {
        return view('user.dashboard');
    }
}
