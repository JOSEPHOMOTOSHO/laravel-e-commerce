<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class City extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];

    protected $searchable = [
        'columns' => [
            'cities.name' => 10
        ],
    ];

    public $timestamps = false;

    public function getStatusAttribute(): string
    {
        return $this->attributes['status'] == 0 ? 'Inactive' : 'Active';
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }
}
