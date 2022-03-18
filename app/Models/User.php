<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property Order $latestOrder
 * @property Order $oldestOrder
 * @property Order $largestOrder
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function latestOrder(): HasOne
    {
        return $this->hasOne(Order::class)
                    ->latestOfMany()
                    ->withDefault();
    }

    /**
     * Get the user's oldest order.
     */
    public function oldestOrder(): HasOne
    {
        return $this->hasOne(Order::class)
                    ->oldestOfMany()
                    ->withDefault();
    }

    /**
     * Get the user's largest order.
     */
    public function largestOrder(): HasOne
    {
        return $this->hasOne(Order::class)
                    ->ofMany('price', 'max')
                    ->withDefault();
    }
}
