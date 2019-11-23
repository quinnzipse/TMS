<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeCard extends Model
{
    protected $table = "time_card";

    protected $fillable = [
        "id", 'tid', 'in', 'out', 'diff'
    ];
}
