<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = "task";

    protected $fillable = [
        'id', 'uid',  'category', 'priority', 'title',
        'desc', 'minutes', 'est_minutes',
        'start_date', 'end_Date', 'in_use',
        'status', 'flag', 'shared'
    ];

}
