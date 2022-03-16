<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property \Illuminate\Database\Eloquent\Collection $videos
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'pivot_taggable_id' => 'integer',
    ];

    /**
     * Get all the posts that are assigned this tag.
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable')
                    ->using(Taggable::class)
                    ->withTimestamps();
    }

    /**
     * Get all the videos that are assigned this tag.
     */
    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable')
                    ->using(Taggable::class)
                    ->withTimestamps();
    }
}
