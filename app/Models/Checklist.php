<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    public function user(){
        return $this->hasOne('user');
    }

    public function equipamentChecklist(){
        return $this->hasOne('App\Http\Model\Equipament_checklist');
    }

    public function checklistAnswer()
    {
        $this->belongsTo('App\Http\Model\Checklist_answer');
    }
}
