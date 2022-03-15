<?php

namespace Tests\Integration\Models;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OneToOnePolymorphicTest extends TestCase
{
    use DatabaseMigrations;
    use WithFaker;

    /** @test */
    public function a_user_morphs_to_image(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        // withDefault()
        $this->assertInstanceOf(Image::class, $user->image);
        $this->assertNull($user->image->url);
        $this->assertSame($user->image->imageable_id, $user->id);
        $this->assertSame($user->image->imageable_type, get_class($user));

        // create
        $image = Image::factory()->for($user, 'imageable')->create();
        $user->refresh();

        $this->assertInstanceOf(Image::class, $user->image);
        $this->assertTrue($image->is($user->image));
        $this->assertNotNull($user->image->url);
        $this->assertSame($image->url, $user->image->url);
        $this->assertSame($user->image->imageable_id, $user->id);
        $this->assertSame($user->image->imageable_type, get_class($user));
    }

    /** @test */
    public function a_post_morphs_to_image(): void
    {
        /** @var Post $post */
        $post = Post::factory()->create();

        // withDefault()
        $this->assertInstanceOf(Image::class, $post->image);
        $this->assertNull($post->image->url);
        $this->assertSame($post->image->imageable_id, $post->id);
        $this->assertSame($post->image->imageable_type, get_class($post));

        // create
        $image = Image::factory()->for($post, 'imageable')->create();
        $post->refresh();

        $this->assertInstanceOf(Image::class, $post->image);
        $this->assertTrue($image->is($post->image));
        $this->assertNotNull($post->image->url);
        $this->assertSame($image->url, $post->image->url);
        $this->assertSame($post->image->imageable_id, $post->id);
        $this->assertSame($post->image->imageable_type, get_class($post));
    }
}
