<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAccount extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'qq', 'wechat', 'weibo', 'twitter', 'facebook'];

    // protected $touches = ['user'];

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        /**
         * User::class related 关联模型
         * user_id ownerKey 当前表关联字段
         * id relation 关联表字段
         */
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
