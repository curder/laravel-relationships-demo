<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer user_id
 * @property \App\Models\User user
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'body', 'published_at'];


    public function user() : BelongsTo
    {
        /**
         * User::class related 关联模型
         * user_id ownerKey 当前表关联字段
         * id relation 关联表字段，这里指 user 表
         */
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
