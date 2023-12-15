<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Plate;
use App\Models\Order;


class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'address', 'vat_number', 'logo', 'slug', 'phone'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function plates(): HasMany
    {
        return $this->hasMany(Plate::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
