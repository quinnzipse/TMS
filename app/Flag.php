<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $fillable = ['color', 'title', 'priority', 'trigger', 'categories', 'enabled', 'id'];
}

