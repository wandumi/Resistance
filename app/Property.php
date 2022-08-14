<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    public function pronvice()
    {
        return $this->belongsTo(Pronvice::class);
    }
}
