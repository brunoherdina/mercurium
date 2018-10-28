<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    public function type(){
        return $this->hasOne('App\Models\Equipament_type');
    }

    public $timestamps = false;
}
