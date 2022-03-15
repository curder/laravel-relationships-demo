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

    protected User $user;
    protected UserAccount $user_account;

    protected function setUp() : void
    {
        parent::setUp();
        $this->user_account = UserAccount::factory()
                                   ->for($this->user = User::factory()->create())
                                   ->create();
    }
    /** @test */
    public function a_user_has_one_account(): void
    {
        $this->assertTrue($this->user_account->is($this->user->account));
        $this->assertInstanceOf(UserAccount::class, $this->user->account);
        $this->assertInstanceOf(HasOneOrMany::class, $this->user->account());
    }

    /** @test */
    public function an_user_account_belongs_to_a_user(): void
    {
        $this->assertTrue($this->user->is($this->user_account->user));
        $this->assertInstanceOf(User::class, $this->user_account->user);
        $this->assertInstanceOf(Relation::class, $this->user_account->user());
    }
}
