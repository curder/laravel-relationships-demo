<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 *
 * @property User $user
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'body', 'published_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
