<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {
        return $request;
        /*
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ]);

        if(!empty($request->password)){
            $password = trim($request->password);
        }else{
            $password = 'password';
        }
        $user =new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);



        $user->save();
        $user->syncRoles($request->role);

        return redirect()->back()->with('message', 'Added User Data!');
        */
    }

}
