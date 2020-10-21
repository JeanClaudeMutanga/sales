<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    public function Fibre()
    {
        return $this->belongsTo(Fibre::class);
    }

    public function School()
    {
        return $this->belongsTo(School::class);
    }
}
