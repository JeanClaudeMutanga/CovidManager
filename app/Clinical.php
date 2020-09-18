<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinical extends Model
{
    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }
}
