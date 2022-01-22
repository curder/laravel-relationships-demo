<?php

namespace Tests\Itegration\Models;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OwnerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_owners_table(): void
    {
        $this->assertTrue(Schema::hasTable('owners'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'car_id',
            'name',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('owners'), $columns);
        $this->assertTrue(Schema::hasColumns('owners', $columns));
    }
}
