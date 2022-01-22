<?php

namespace Tests\Itegration\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

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
