<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $guarded = [];

    public function financial_section()
    {
        return $this->belongsTo(FinancialSection::class);
    }
}
