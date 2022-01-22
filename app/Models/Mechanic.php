<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @property Owner|HasOneThrough|null carOwner
 */
class Mechanic extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the car's owner.
     */
    public function carOwner(): HasOneThrough
    {
        return $this->hasOneThrough(
            Owner::class,
            Car::class,
            'mechanic_id', // Foreign key on mechanics table...
            'car_id', // Foreign key on cars table...
            'id', // Local key on owners table...
            'id' // Local key on cars table...
        )->withDefault();
    }
}
