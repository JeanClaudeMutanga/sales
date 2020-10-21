<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    public function Opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
