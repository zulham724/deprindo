<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function regency()
    {
        return $this->belongsTo('App\Regency');
    }
    public function partner_category()
    {
        return $this->belongsTo('App\PartnerCategory');
    }
}
