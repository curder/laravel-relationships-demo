<?php

namespace Tests\Integration\Models;


use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoleUserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_role_user_table(): void
    {
        $this->assertTrue(Schema::hasTable('role_user'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'user_id',
            'role_id',
            'description',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('role_user'), $columns);
        $this->assertTrue(Schema::hasColumns('role_user', $columns));
    }
}
