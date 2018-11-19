<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistAnswer extends Model
{
    public function checklist(){
        return $this->hasOne('App\Models\Checklist');
    }

    public function equipamentChecklist(){
        return $this->hasOne('App\Models\EquipamentChecklist');
    }

    public function question(){
        return $this->hasOne('App\Models\ChecklistQuestion');
    }
}
