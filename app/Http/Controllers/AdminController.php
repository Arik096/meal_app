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
         $entry_time_max_id=DB::table('entry_times')->max('id');
         $entry_time = DB::table('entry_times')->where('id','=', $entry_time_max_id)->get('entry_last_time');

         $today = Carbon::now();

         $lunch_count = DB::table('meals')->where('lunch_date', Carbon::now()->toDateString())->sum('lunch');
         $guest_lunch_count = DB::table('meals')->where('lunch_date', Carbon::now()->toDateString())->sum('guest_lunch');
         $total_lunch = $lunch_count + $guest_lunch_count;


         return view('admin.dashboard', compact('today','users','total_lunch', 'entry_time'));
    }

    public function store(Request $request)
    {

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
        $user->syncRoles(explode(',',$request->roles));

        return redirect()->back()->with('message', 'Added User Data!');

    }

}
