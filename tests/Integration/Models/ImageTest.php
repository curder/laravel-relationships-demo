<?php

namespace Tests\Integration\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * Class ImageTest
 *
 * @package \Tests\Integration\Models
 */
class ImageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_images_table(): void
    {
        $this->assertTrue(Schema::hasTable('images'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'url',
            'imageable_type',
            'imageable_id',
            'likes',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('images'), $columns);
        $this->assertTrue(Schema::hasColumns('images', $columns));
    }
}
