<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntryTime extends Model
{
    protected $table = 'entry_times';
    protected $fillable = ['entry_last_time'];
}
