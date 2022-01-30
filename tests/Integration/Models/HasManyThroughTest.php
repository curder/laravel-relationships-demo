<?php

namespace Tests\Integration\Models;

use App\Models\Country;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class HasManyThroughTest
 *
 * @package \Tests\Integration\Models
 */
class HasManyThroughTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_country_has_many_posts(): void
    {
        /** @var Country $country */
        $country = Country::factory()->create();
        /** @var User $user */
        $user = User::factory()->create(['country_id' => $country]);
        /** @var Post $post */
        $post = Post::factory()->create(['user_id' => $user]);

        $this->assertInstanceOf(Collection::class, $country->posts);
        $this->assertInstanceOf(Post::class, $country->posts->first());
        $this->assertEquals($post->id, $country->posts->first()->id);
    }
}
