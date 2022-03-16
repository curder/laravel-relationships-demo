<?php

namespace Tests\Integration\Models;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Taggable;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

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

    /** @test */
    public function a_tag_morphs_to_many_posts(): void
    {
        $tag = Tag::factory()
                  ->hasAttached(Post::factory()->create(), [], 'posts')
                  ->create();

        $this->assertInstanceOf(Collection::class, $tag->posts);
        $this->assertInstanceOf(Taggable::class, $tag->posts->first()->pivot);

        $this->assertInstanceOf(Collection::class, $tag->posts);
        $this->assertInstanceOf(Post::class, $tag->posts->first());
        $this->assertInstanceOf(MorphToMany::class, $tag->posts());
        $this->assertFalse($tag->posts->isEmpty());
        $this->assertSame($tag->posts->first()->getOriginal('pivot_taggable_id'), $tag->id);
        $this->assertSame($tag->posts->first()->getOriginal('pivot_taggable_type'), Post::class);
    }

    /** @test */
    public function a_tag_morphs_to_many_videos(): void
    {
        $tag = Tag::factory()
                  ->hasAttached(Video::factory()->create(), [], 'videos')
                  ->create();

        $this->assertInstanceOf(Collection::class, $tag->videos);
        $this->assertInstanceOf(Taggable::class, $tag->videos->first()->pivot);

        $this->assertInstanceOf(Collection::class, $tag->videos);
        $this->assertInstanceOf(Video::class, $tag->videos->first());
        $this->assertInstanceOf(MorphToMany::class, $tag->videos());
        $this->assertFalse($tag->videos->isEmpty());
        $this->assertSame($tag->videos->first()->getOriginal('pivot_taggable_id'), $tag->id);
        $this->assertSame($tag->videos->first()->getOriginal('pivot_taggable_type'), Video::class);
    }
}
