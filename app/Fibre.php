<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fibre extends Model
{
    protected $guarded = [];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Docs()
    {
        return $this->hasMany(Docs::class);
    }
    
    public function Updates()
    {
        return $this->hasMany(Updates::class);
    }
}
