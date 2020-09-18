<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guarded = [];

    public function User(){
        return $this->hasMany(User::class);
    }

    public function Patients(){
        return $this->hasMany(Patients::class);
    }

    public function Recoveries(){
        return $this->hasMany(Recoveries::class);
    }

    public function Deaths(){
        return $this->hasMany(Deaths::class);
    }

    public function PPEs(){
        return $this->hasMany(PPEs::class);
    }

    public function Beds(){
        return $this->hasMany(Beds::class);
    }

    public function Admit()
    {
        return $this->hasMany(Admit::class);
    }

    public function Referrals()
    {
        return $this->hasMany(Referrals::class);
    }

    public function Discharges()
    {
        return $this->hasMany(Discharges::class);
    }
}
