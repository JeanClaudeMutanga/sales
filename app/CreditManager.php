<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditManager extends Model
{
    public function Opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
