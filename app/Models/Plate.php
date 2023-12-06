<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use App\Models\Restaurant;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'ingredients', 'cover_image', 'price', 'is_available', 'restaurant_id'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
