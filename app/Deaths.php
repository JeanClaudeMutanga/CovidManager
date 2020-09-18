<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deaths extends Model
{
    public function getRouteKeyName(){
        return 'idnumber';
    }

    protected $guarded = [];

    public function Facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
