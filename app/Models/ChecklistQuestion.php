<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistQuestion extends Model
{
    public $timestamps = false;

    public function equipamentChecklist()
    {
        $this->belongsToMany('App\Http\Model\Equipament_checklist');
    }

    public function checklistAnswer()
    {
        $this->belongsTo('App\Http\Model\Checklist_answer');
    }

}
