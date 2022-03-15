<?php

namespace Tests\Integration\Models;

use App\Models\Taggable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * @see Taggable
 */
class TaggableTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_taggables_table(): void
    {
        $this->assertTrue(Schema::hasTable('taggables'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'tag_id',
            'taggable_type',
            'taggable_id',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('taggables'), $columns);
        $this->assertTrue(Schema::hasColumns('taggables', $columns));
    }
}
