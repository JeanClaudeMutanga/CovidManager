<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function Patients()
    {
        return $this->belongs(Patients::class);
    }
}
