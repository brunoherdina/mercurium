<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Checklist extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            'version'    =>  $this->version,
            'equipament_type_id' => $this->equipament_type_id,
            'questions' =>  Questions::collection($this->question),

        ];
    }
}
