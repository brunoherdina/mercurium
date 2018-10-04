<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipamentType extends Model
{
    public $timestamps = false;

    public function equipament()
    {
        return $this->belongsTo('Equipaments');
    }
}
