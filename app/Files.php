<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }
}
