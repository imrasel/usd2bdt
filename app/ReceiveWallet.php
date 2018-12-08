<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveWallet extends Model
{
    protected $fillable = [
        'name', 'icon', 'amount', 'currency'
    ];


    public function trrate() {
        return $this->hasMany('App\TrRate');
    }
}
