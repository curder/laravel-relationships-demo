<?php

namespace Tests\Integration\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * @see User
 */
class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_users_table(): void
    {
        $this->assertTrue(Schema::hasTable('users'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('users'), $columns);
        $this->assertTrue(Schema::hasColumns('users', $columns));
    }
}
