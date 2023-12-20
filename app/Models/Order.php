<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'customer_email', 'customer_phone', 'customer_address', 'customer_message', 'state', 'data', 'tot_price', 'restaurant_id', 'slug'];

    public function plates(): BelongsToMany
    {
        return $this->belongsToMany(Plate::class, 'order_plate')->withPivot('quantity_plate');
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }
}
