<?php

namespace Tests\Integration\Models;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ManyToManyPolymorphicTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_post_morphs_to_many_tags(): void
    {
        $post = Post::factory()->hasAttached(Tag::factory()->count(20)->create())->create();
        $this->assertInstanceOf(Collection::class, $post->tags);

        $this->assertInstanceOf(Collection::class, $post->tags);
        $this->assertInstanceOf(Tag::class, $post->tags->first());
        $this->assertInstanceOf(MorphToMany::class, $post->tags());
        $this->assertFalse($post->tags->isEmpty());
        $this->assertSame($post->tags->first()->getOriginal('pivot_taggable_id'), $post->id);
        $this->assertSame($post->tags->first()->getOriginal('pivot_taggable_type'), get_class($post));
    }

    /** @test */
    public function a_video_morphs_to_many_tags(): void
    {
        $video = Video::factory()->hasAttached(Tag::factory()->count(20)->create())->create();
        $this->assertInstanceOf(Collection::class, $video->tags);

        $this->assertInstanceOf(Collection::class, $video->tags);
        $this->assertInstanceOf(Tag::class, $video->tags->first());
        $this->assertInstanceOf(MorphToMany::class, $video->tags());
        $this->assertFalse($video->tags->isEmpty());
        $this->assertSame($video->tags->first()->getOriginal('pivot_taggable_id'), $video->id);
        $this->assertSame($video->tags->first()->getOriginal('pivot_taggable_type'), get_class($video));
    }
}
