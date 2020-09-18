<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->idnumber,
            'name'=> $this->name,
            'street'=> $this->street,
            'town'=> $this->town,
            'dob'=> $this->dob,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'occupation'=> $this->occupation,
            'conditions'=> $this->conditions,
            'date'=>$this->created_at,
            'status'=>$this->result
        ];
    }
}
