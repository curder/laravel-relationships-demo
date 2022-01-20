<?php
namespace Tests\Integration\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * Class UserAccountTest
 *
 * @package \Tests\Integration\Models
 */
class UserAccountTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_users_table(): void
    {
        $this->assertTrue(Schema::hasTable('user_accounts'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'qq',
            'wechat',
            'weibo',
            'twitter',
            'facebook',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('user_accounts'), $columns);
        $this->assertTrue(Schema::hasColumns('user_accounts', $columns));
    }
}
