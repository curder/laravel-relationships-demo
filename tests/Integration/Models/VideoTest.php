<?php

namespace Tests\Integration\Models;

use App\Models\Video;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * @see Video
 */
class VideoTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_videos_table(): void
    {
        $this->assertTrue(Schema::hasTable('videos'));
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

        $this->assertSame(Schema::getColumnListing('videos'), $columns);
        $this->assertTrue(Schema::hasColumns('videos', $columns));
    }
}
