<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int id
 *
 * @property HasManyThrough posts
 */
class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'display_name'];

    public function posts(): HasManyThrough
    {
        /**
         * @param  string      $related
         * @param  string      $through
         * @param  string|null $firstKey
         * @param  string|null $secondKey
         * @param  string|null $localKey 不填默认为当前模型的主键
         */
        return $this->hasManyThrough(Post::class, User::class);
    }
}
