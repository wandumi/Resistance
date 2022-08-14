<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresentationSection extends Model
{
    protected $guarded = [];

    public function presentation()
    {
        return $this->hasMany(Presentation::class);
    }
}
