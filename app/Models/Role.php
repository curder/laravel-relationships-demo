<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property BelongsToMany users
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'display_name', 'description'];

    public function users() : BelongsToMany
    {
        /**
         * @param  string $related         关联关系
         * @param  string $table           关联中间表 不填默认为 role_user
         * @param  string $foreignPivotKey 当前模型的外键id,不填默认为 role_id 规则为：Str::snake(class_basename($this)).'_'.$this->primaryKey;
         * @param  string $relatedPivotKey 关联模型的外键id，不填默认为 user_id 规则为：Str::snake(class_basename($related)).'_'.$related->primaryKey
         * @param  string $foreignKey      当前模型的主键, 不填默认为 id 规则为：$this->primaryKey;
         * @param  string $relatedKey      关联模型的主键，不填默认为 id 规则为：$related->primaryKey
         * @param  string $relation        关联方法名 不填默认为 users
         */
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id', 'id', 'id', 'users')
                    ->using(RoleUser::class)
                    ->withPivot(['description']) // 中间表的字段，这里的中间表是 role_user，默认有 created_at和 updated_at 字段
                    ->withTimestamps();
    }
}
