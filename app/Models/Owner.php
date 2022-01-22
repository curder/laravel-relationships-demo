<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
