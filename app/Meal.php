<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';
    protected $fillable = ['user_id', 'lunch', 'guest_lunch', 'lunch_date'];
}
