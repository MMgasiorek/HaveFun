<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function participatedEvents(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}