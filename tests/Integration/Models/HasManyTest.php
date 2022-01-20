<?php

namespace Tests\Integration\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HasManyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_has_many_posts(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user]);

        $this->assertInstanceOf(Post::class, $user->posts()->first());
        $this->assertInstanceOf(Collection::class, $user->posts);
        $this->assertInstanceOf(HasOneOrMany::class, $user->posts());
        $this->assertEquals($post->user_id, $user->id);
    }

    /** @test */
    public function a_post_belongs_to_a_user(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user]);

        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals($user->id, $post->user->id);
        $this->assertInstanceOf(User::class, $post->user);
        $this->assertInstanceOf(Relation::class, $post->user());
    }
}
