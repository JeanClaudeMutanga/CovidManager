<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discharges extends Model
{
    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }

    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
