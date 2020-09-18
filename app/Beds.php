<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function Admit()
    {
        return $this->hasMany(Admit::class);
    }

    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }
}



