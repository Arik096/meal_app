<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;

class MealController extends Controller
{
    public function store(Request $request)
    {


         $this->validate($request, [
             'user_id' => 'required|numeric',
            'lunch_date' => 'required|date|unique:meals',
            'lunch' => 'required|boolean',
            'guest_lunch' => 'required|numeric',
         ]);

        $meal = new Meal;

        $meal->user_id = $request->user_id;
        $meal->lunch = $request->lunch;
        $meal->guest_lunch = $request->guest_lunch;
        $meal->lunch_date = $request->lunch_date;

        $meal->save();
        return redirect()->back()->with('message', 'Lunch Data!');
    }
}
