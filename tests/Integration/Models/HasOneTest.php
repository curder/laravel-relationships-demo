<?php

namespace Tests\Integration\Models;

use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class HasOneTest
 *
 * @package \Tests\Integration\Models
 */
class HasOneTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_has_one_account(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $user_account = UserAccount::factory()->create(['user_id' => $user]);

        $this->assertTrue($user_account->is($user->account));
        $this->assertInstanceOf(UserAccount::class, $user->account);
        $this->assertInstanceOf(HasOneOrMany::class, $user->account());
    }

    /** @test */
    public function an_user_account_belongs_to_a_user(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var UserAccount $account */
        $account = UserAccount::factory()->create(['user_id' => $user]);

        $this->assertTrue($user->is($account->user));
        $this->assertInstanceOf(User::class, $account->user);
        $this->assertInstanceOf(Relation::class, $account->user());
    }
}
