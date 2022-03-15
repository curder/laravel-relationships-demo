<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
    ];

    protected $casts = [
        'imageable_id' => 'integer',
    ];

    /**
     * Get the parent imageable model (user or post).
     */
    public function imageable() : MorphTo
    {
        return $this->morphTo();
    }
}
