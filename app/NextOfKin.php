<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    public function Patients()
    {
        return $this->belongs(Patients::class);
    }
}
