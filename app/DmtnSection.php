<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmtnSection extends Model
{
    protected $guarded = [];

    public function dmtn()
    {
        return $this->hasMany(Dmtn::class);
    }
}
