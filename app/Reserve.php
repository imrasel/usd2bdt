<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'name', 'amount', 'currency', 'icon'
    ];
}
