<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $guarded =[];
   
    public function Doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function NextOfKin()
    {
        return $this->hasOne(NextOfKin::class);
    }

    public function Clinical()
    {
        return $this->hasOne(Clinical::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function Contacts()
    {
        return $this->hasMany(Contacts::class);
    }

    public function Location()
    {
        return $this->hasOne(Location::class);
    }

    public function Files()
    {
        return $this->hasOne(Files::class);
    }

    public function PPEs()
    {
        return $this->belongsTo(PPEs::class);
    }

    public function Admit()
    {
        return $this->hasOne(Admit::class);
    }

    public function Beds()
    {
        return $this->hasOne(Beds::class);
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
