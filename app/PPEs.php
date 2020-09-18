<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPEs extends Model
{
    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function Patients()
    {
        return $this->hasMany(Patients::class);
    }
}
