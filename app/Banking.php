<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banking extends Model
{
    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
