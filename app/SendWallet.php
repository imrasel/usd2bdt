<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendWallet extends Model
{
    protected $fillable = [
        'name', 'icon', 'amount', 'currency', 'my_account'
    ];


    public function trrate() {
        return $this->hasMany('App\TrRate');
    }
}
