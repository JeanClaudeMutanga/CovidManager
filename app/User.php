<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','designation','province','username','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Patients()
    {
        return $this->hasMany(Patients::class);
    }

    public function Location()
    {
        return $this->hasMany(Location::class);
    }

    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function setPasswordAttribute($value)
     {
         $this->attributes['password'] = bcrypt($value);
     }

    
}
