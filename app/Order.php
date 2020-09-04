<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'title', 'first_name', 'last_name',  'email', 'company_name',
        'country', 'shipping_address', 'billing_address',
        'zip', 'city', 'state', 'charge_id'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
