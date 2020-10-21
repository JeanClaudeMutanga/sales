<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function Banking()
    {
        return $this->hasOne(School::class);
    }

    public function Docs()
    {
        return $this->hasMany(Docs::class);
    }
}
