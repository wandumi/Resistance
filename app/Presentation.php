<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $guarded = [];

    public function presentation_section()
    {
        return $this->belongsTo(PresentationSection::class);
    }
}
