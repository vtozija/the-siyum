<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'title', 'first_name', 'last_name',  'email', 'company_name',
        'country', 'shipping_address1', 'shipping_address2',
        'zip', 'city', 'state', 'charge_id'
    ];
}
