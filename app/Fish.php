<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{

    public function lakes()
    {
        return $this->belongsToMany('App\Lake','fish_lakes','fish_id','lake_id');
    }

    public function scopeWithData($query)
    {
        return $query->with('fish_data');
    }

    public function fish_data()
    {
        return $this->hasMany('App\Fish_data');
    }
}
