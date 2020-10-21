<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function CreditHistory()
    {
        return $this->hasOne(CreditHistory::class);
    }

    public function CustomerOrder()
    {
        return $this->hasOne(CustomerOrder::class);
    }

    public function CreditManager()
    {
        return $this->hasOne(CreditManager::class);
    }

    public function VettingEscalations()
    {
        return $this->hasOne(VettingEscalations::class);
    }

    public function Cof2Admin()
    {
        return $this->hasOne(Cof2Admin::class);
    }

    public function Cof2Client()
    {
        return $this->hasOne(Cof2Client::class);
    }

    public function FollowUp()
    {
        return $this->hasOne(FollowUp::class);
    }

    public function InformClient()
    {
        return $this->hasOne(InformClient::class);
    }

    public function ReceiveCof()
    {
        return $this->hasOne(ReceiveCof::class);
    }
}
