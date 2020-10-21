<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveCof extends Model
{
    public function Opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }

    public function Updates()
    {
        return $this->hasMany(Updates::class);
    }
}
