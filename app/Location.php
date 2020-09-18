<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function Patients()
    {
        return $this->belongsTo(Patients::class);
    }
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
