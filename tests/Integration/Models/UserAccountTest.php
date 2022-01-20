<?php

namespace Tests\Integration\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

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
