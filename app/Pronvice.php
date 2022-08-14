<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pronvice extends Model
{
    protected $guarded = [];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
