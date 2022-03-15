<?php

namespace Tests\Integration\Models;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class HasManyTest extends TestCase
{
    use DatabaseMigrations;

    protected User $user;
    protected Post $post;

    protected function setUp() : void
    {
        parent::setUp();

        $this->post = Post::factory()
                    ->for($this->user = User::factory()->create())
                    ->create();
    }
    /** @test */
    public function a_user_has_many_posts(): void
    {
        $this->assertInstanceOf(Post::class, $this->user->posts()->first());
        $this->assertInstanceOf(Collection::class, $this->user->posts);
        $this->assertInstanceOf(HasOneOrMany::class, $this->user->posts());
        $this->assertEquals($this->post->user_id, $this->user->id);
    }

    /** @test */
    public function a_post_belongs_to_a_user(): void
    {
        $this->assertEquals($this->user->id, $this->post->user->id);
        $this->assertEquals($this->user->id, $this->post->user_id);
        $this->assertInstanceOf(User::class, $this->post->user);
        $this->assertInstanceOf(Relation::class, $this->post->user());
    }
}
