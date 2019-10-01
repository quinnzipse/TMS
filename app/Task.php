<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $table = "task";

    protected $fillable = [
        'id', 'userID',  'category', 'priority', 'title',
        'desc', 'minutes', 'est_Minutes',
        'start_date', 'end_Date',
        'status', 'flag', 'shared'
    ];

}
