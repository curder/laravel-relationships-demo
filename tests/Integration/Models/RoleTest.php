<?php

namespace Tests\Integration\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_roles_table(): void
    {
        $this->assertTrue(Schema::hasTable('roles'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'name',
            'display_name',
            'description',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('roles'), $columns);
        $this->assertTrue(Schema::hasColumns('roles', $columns));
    }
}
