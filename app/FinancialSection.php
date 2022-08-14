<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialSection extends Model
{
    protected $guarded = [];

    public function financial()
    {
        return $this->hasMany(Financial::class);
    }
}
