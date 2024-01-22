<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContaPagar extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'title',
        'email_pay',
        'email_receive',
        'date',
        'payment_form',
        'value',
        'plots',
        'paid'
    ];
}
