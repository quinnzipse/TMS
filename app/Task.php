<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public $table = "";

    protected $fillable = [
        'id', 'category', 'priority', 'title', 'desc', 'minutes', 'estMinutes', 'startDateTime', 'endDateTime', 'status', 'flag', 'shared'
    ];


}
