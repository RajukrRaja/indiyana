<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_id', 'amount', 'location', 'time_delta', 
        'payment_intent_id', 'verified', 'risk_score', 'is_fraud', 'status'
    ];
}