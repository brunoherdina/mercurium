<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipamentType extends Model
{
    public $timestamps = false;

    public function equipament()
    {
        return $this->belongsTo('App\Models\Equipaments');
    }

    public function equipamentChecklist()
    {
        return $this->belongsTo('App\Models\EquipamentChecklist');
    }
}
