<?php
namespace Tests\Integration\Models;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * @see Tag
 */
class TagTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_tags_table(): void
    {
        $this->assertTrue(Schema::hasTable('tags'));
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

        $this->assertSame(Schema::getColumnListing('tags'), $columns);
        $this->assertTrue(Schema::hasColumns('tags', $columns));
    }
}
