<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistAnswer extends Model
{
    public function checklist(){
        return $this->hasOne('App\Http\Model\Checklist');
    }

    public function equipamentChecklist(){
        return $this->hasOne('App\Http\Model\Equipament_checklist');
    }

    public function question(){
        return $this->hasMany('App\Http\Model\Checklist_question');
    }
    public $timestamps = false;
}
