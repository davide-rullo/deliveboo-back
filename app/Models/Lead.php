<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_email',  'customer_phone', 'customer_address', 'customer_message', 'state', 'data', 'tot_price', 'restaurant_id', 'slug'];
}
