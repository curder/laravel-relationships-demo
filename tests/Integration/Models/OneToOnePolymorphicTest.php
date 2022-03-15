<?php
namespace Tests\Integration\Models;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OneToOnePolymorphicTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

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
        $user->image()->create([
            'url' => $url = $this->faker->imageUrl(),
        ]);
        $user->refresh();

        $this->assertInstanceOf(Image::class, $user->image);
        $this->assertNotNull($user->image->url);
        $this->assertSame($url, $user->image->url);
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
        $post->image()->create([
            'url' => $url = $this->faker->imageUrl(),
        ]);
        $post->refresh();

        $this->assertInstanceOf(Image::class, $post->image);
        $this->assertNotNull($post->image->url);
        $this->assertSame($url, $post->image->url);
        $this->assertSame($post->image->imageable_id, $post->id);
        $this->assertSame($post->image->imageable_type, get_class($post));
    }

}
