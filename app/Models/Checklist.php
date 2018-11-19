<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function user(){
        return $this->hasOne('App\User');
    }

    public function equipamentChecklist(){
        return $this->hasOne('App\Models\EquipamentChecklist');
    }

    public function checklistAnswer()
    {
        $this->belongsTo('App\Models\ChecklistAnswer');
    }
}
