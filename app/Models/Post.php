<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property int user_id
 *
 * @property BelongsTo user
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
