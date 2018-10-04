<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipamentChecklist extends Model
{
    public function question(){
        return $this->hasMany('App\Http\Model\Checklist_question');
    }

    public function equipament(){
        return $this->hasOne('App\Http\Model\Equipament');
    }

    public function checklist()
    {
        return $this->belongsTo('App\Http\Model\Checklist');
    }

    public $timestamps = false;
}
