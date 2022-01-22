<?php

namespace Tests\Itegration\Models;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MechanicTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_mechanics_table(): void
    {
        $this->assertTrue(Schema::hasTable('mechanics'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'name',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('mechanics'), $columns);
        $this->assertTrue(Schema::hasColumns('mechanics', $columns));
    }
}
