<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property BelongsToMany roles
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

    public function roles(): BelongsToMany
    {
        /**
         * @param  string $related    关联关系
         * @param  string $table      关联中间表 不填这里默认为 role_user 规则为：Str::snake(class_basename($related)). '_' . Str::snake(class_basename($this)) 并在数据拼接前使用 sort() 排序；
         * @param string $foreignPivotKey 当前模型的外键id, 不填默认为 user_id 规则为：Str::snake(class_basename($this)).'_'.$this->primaryKey;
         * @param string $relatedPivotKey 关联模型的外键id，不填默认为 role_id 规则为：Str::snake(class_basename($related)).'_'.$related->primaryKey
         * @param  string $foreignKey 当前模型的主键, 不填默认为 id 规则为：$this->primaryKey;
         * @param  string $relatedKey 关联模型的主键，不填默认为 id 规则为：$related->primaryKey
         * @param  string $relation   关联方法名 不填默认为roles
         */
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id', 'id', 'roles')
                    ->using(RoleUser::class)
                    ->withPivot(['description']) // 中间表的字段，这里的中间表是 role_user，默认有 created_at和 updated_at 字段
                    ->withTimestamps();
    }
}
