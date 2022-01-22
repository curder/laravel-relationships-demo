<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoleUser extends Pivot
{
    use HasFactory;

    public function test()
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $user->roles()->updateExistingPivot($role_id,['created_at'=>'2019-04-24 06:08:22']);
    }
}
