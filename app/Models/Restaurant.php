<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'address', 'vat_number', 'logo', 'slug', 'phone'];

    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
