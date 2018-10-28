<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    public $timestamps = false;

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}
