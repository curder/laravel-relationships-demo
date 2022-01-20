<?php

namespace Tests\Integration\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
