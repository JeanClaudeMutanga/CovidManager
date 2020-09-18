<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admit extends Model
{
    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }

    public function Beds()
    {
        return $this->belongsTo(Beds::class);
    }
}
