<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recoveries extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName(){
        return 'idnumber';
    }

    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }

    
}
