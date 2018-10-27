<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipamentChecklist extends Model
{
    public function question(){
        return $this->hasMany('App\Http\Model\ChecklistQuestion');
    }

    public function equipamentType(){
        return $this->hasOne('App\Http\Model\EquipamentType');
    }

    public function checklist()
    {
        return $this->belongsTo('App\Http\Model\Checklist');
    }

    public $timestamps = false;
}
