<?php

namespace Tests\Itegration\Models;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_cars_table(): void
    {
        $this->assertTrue(Schema::hasTable('cars'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'model',
            'mechanic_id',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('cars'), $columns);
        $this->assertTrue(Schema::hasColumns('cars', $columns));
    }
}
