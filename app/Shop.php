<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
