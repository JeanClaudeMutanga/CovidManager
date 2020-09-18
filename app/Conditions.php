<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conditions extends Model
{
    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }
}
