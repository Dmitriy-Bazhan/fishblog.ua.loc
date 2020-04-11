<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lake extends Model
{
    public function fishes()
    {
        return $this->belongsToMany('App\Fish','fish_lakes','lake_id','fish_id');
    }

    public function scopeWithData($query)
    {
        return $query->with('lake_data');
    }

    public function lake_data()
    {
        return $this->hasMany('App\Lake_data');
    }
}
