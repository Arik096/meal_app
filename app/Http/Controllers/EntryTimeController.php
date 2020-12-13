<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EntryTime;
use DB;

class EntryTimeController extends Controller
{
    public function store (Request $request)
    {
        $this->validate($request, [
            'entry_last_time' => 'date_format:H:i',
        ]);

        $new_entry_time = new EntryTime();

        $new_entry_time->entry_last_time = $request->entry_last_time;

        $new_entry_time->save();
        return redirect()->back()->with('message', 'New Time Added!');
    }
}
