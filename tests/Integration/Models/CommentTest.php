<?php

namespace Tests\Integration\Models;

use App\Models\Comment;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * @see Comment
 */
class CommentTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_comments_table(): void
    {
        $this->assertTrue(Schema::hasTable('comments'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'body',
            'commentable_type',
            'commentable_id',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('comments'), $columns);
        $this->assertTrue(Schema::hasColumns('comments', $columns));
    }
}
