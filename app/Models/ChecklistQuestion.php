<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistQuestion extends Model
{
    public $timestamps = false;

    public function equipamentChecklist()
    {
        $this->belongsToMany('App\Models\EquipamentChecklist');
    }

    public function checklistAnswer()
    {
        $this->belongsTo('App\Models\Checklist_answer');
    }

    public function equipamentType()
    {
        $this->belongsTo('App\Models\EquipamentType');
    }

}
