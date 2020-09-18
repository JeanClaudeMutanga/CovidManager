<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    public function Facility()
    {
        return $this->hasMany(Facility::class);
    }
}
