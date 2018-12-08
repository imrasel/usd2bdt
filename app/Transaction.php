<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $hidden = [
        'send_wallet', 'receive_wallet', 'sendAmount', 'receiveAmount', 'receiveAccount', 'email', 'user_id', 'user_name', 'user_transaction_email'
    ];
    
    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }
            
}
