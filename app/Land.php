<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Land extends Model
{
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function regency()
    {
        return $this->belongsTo('App\Regency');
    }
    
    public function province_loc()
    {
        return $this->belongsTo('App\Province','province_location');
    }
    public function regency_loc()
    {
        return $this->belongsTo('App\Regency','regency_location');
    }
}
