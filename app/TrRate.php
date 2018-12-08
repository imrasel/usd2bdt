<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrRate extends Model
{
    public function sendwallet() {
        return $this->belongsTo('App\SendWallet');
    }

    public function receivewallet() {
        return $this->belongsTo('App\ReceiveWallet');
    }
}
