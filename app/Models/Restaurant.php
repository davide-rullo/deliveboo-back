<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'address', 'vat_number', 'logo', 'slug', 'phone'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
