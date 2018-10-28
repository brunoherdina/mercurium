<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipamentChecklist extends Model
{
    public function question(){
        return $this->hasMany('App\Models\ChecklistQuestion');
    }

    public function equipamentType(){
        return $this->hasOne('App\Models\EquipamentType');
    }

    public function checklist()
    {
        return $this->belongsTo('App\Models\Checklist');
    }

    public $timestamps = false;
}
