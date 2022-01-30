<?php

namespace Tests\Integration\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_countries_table(): void
    {
        $this->assertTrue(Schema::hasTable('countries'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'name',
            'display_name',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('countries'), $columns);
        $this->assertTrue(Schema::hasColumns('countries', $columns));
    }
}
