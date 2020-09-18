<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactsResource extends JsonResource
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
			'case'=> $this->patients_id,
			'name'=> $this->name,
			'surname'=> $this->surname,
			'sex'=> $this->sex,
			'age'=> $this->age,
			'relation'=> $this->relation,
			'date'=> $this->date,
			'place'=> $this->place,
			'address'=> $this->address,
			'phone'=> $this->phone,
			'hcw'=> $this->hcw
		];
    }
}
