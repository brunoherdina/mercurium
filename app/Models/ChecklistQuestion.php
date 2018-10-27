<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistQuestion extends Model
{
    public $timestamps = false;

    public function equipamentChecklist()
    {
        $this->belongsToMany('App\Http\Model\EquipamentChecklist');
    }

    public function checklistAnswer()
    {
        $this->belongsTo('App\Http\Model\Checklist_answer');
    }

    public function equipamentType()
    {
        $this->belongsToMany('App\Http\Model\EquipamentType');
    }

}
