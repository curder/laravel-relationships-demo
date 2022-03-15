<?php

namespace Tests\Integration\Models;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_users_table(): void
    {
        $this->assertTrue(Schema::hasTable('posts'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'title',
            'body',
            'published_at',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('posts'), $columns);
        $this->assertTrue(Schema::hasColumns('posts', $columns));
    }
}
