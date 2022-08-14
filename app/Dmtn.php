<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dmtn extends Model
{
    protected $guarded = [];

    public function dmtn_section()
    {
        return $this->belongsTo(DmtnSection::class);
    }
}
