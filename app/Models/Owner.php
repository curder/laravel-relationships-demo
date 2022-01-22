<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property \App\Models\Car|BelongsTo|null car
 */
class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'name'];

    protected $hidden = ['laravel_through_key'];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
