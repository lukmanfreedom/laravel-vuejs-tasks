<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'task_detail'
    ];
}
