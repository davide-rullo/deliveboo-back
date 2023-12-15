<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Plate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'description', 'ingredients', 'cover_image', 'price', 'is_available', 'restaurant_id'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
