<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Gallery extends Model
{
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function regency()
    {
        return $this->belongsTo('App\Regency');
    }
}
