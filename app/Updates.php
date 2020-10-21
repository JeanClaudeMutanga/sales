<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    protected $guarded = [];
  
    public function Cof2Admin()
    {
        return $this->belongsTo(Cof2Admin::class);
    }

    public function Cof2Client()
    {
        return $this->belongsTo(Cof2Client::class);
    }

    public function FollowUp()
    {
        return $this->belongsTo(FollowUp::class);
    }

    public function InformClient()
    {
        return $this->belongsTo(InformClient::class);
    }

    public function ReceiveCof()
    {
        return $this->belongsTo(ReceiveCof::class);
    }
    
    public function Fibre()
    {
        return $this->belongsTo(Fibre::class);
    }
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    
}
