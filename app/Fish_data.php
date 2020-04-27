<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish_data extends Model
{
    public function fish()
    {
        return $this->belongsTo('App\Fish');
    }
}
