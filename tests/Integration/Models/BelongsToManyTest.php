<?php
namespace Tests\Integration\Models;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Database\Factories\RoleUserFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class BelongsToManyTest
 *
 * @package \Tests\Integration\Models
 */
class BelongsToManyTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function a_user_has_belongs_to_many_roles(): void
    {
        /** @var User $user */
        $user  = User::factory()->create();
        $count = 2;
        $roles = Role::factory()->count($count)->create();
        $user->roles()->attach($roles);

        $this->assertInstanceOf(Role::class, $user->roles()->first());
        $this->assertInstanceOf(Collection::class, $user->roles);
        $this->assertInstanceOf(BelongsToMany::class, $user->roles());
        $this->assertEquals($user->id, $user->roles()->first()->id);
        $this->assertCount($count, $user->roles);

        $this->assertTrue($user->roles()->withTimestamps);
        $this->assertSame(['description', 'created_at', 'updated_at'], $user->roles()->getPivotColumns());
        $this->assertEquals(RoleUser::class, $user->roles()->getPivotClass());
        $this->assertEquals('role_user', $user->roles()->getTable());
    }

    /** @test */
    public function a_role_has_belongs_to_many_users(): void
    {
        /** @var Role $role */
        $role  = Role::factory()->create();
        $count = 2;
        $users = User::factory()->count($count)->create();
        $role->users()->attach($users);

        $this->assertInstanceOf(User::class, $role->users()->first());
        $this->assertInstanceOf(Collection::class, $role->users);
        $this->assertInstanceOf(BelongsToMany::class, $role->users());
        $this->assertEquals($role->id, $role->users()->first()->id);
        $this->assertCount($count, $role->users);

        $this->assertTrue($role->users()->withTimestamps);
        $this->assertSame(['description', 'created_at', 'updated_at'], $role->users()->getPivotColumns());
        $this->assertEquals(RoleUser::class, $role->users()->getPivotClass());
        $this->assertEquals('role_user', $role->users()->getTable());
    }
}
