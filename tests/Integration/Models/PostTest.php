<?php
namespace Tests\Integration\Models;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_posts_table(): void
    {
        $this->assertTrue(Schema::hasTable('posts'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'name',
            'body',
            'published_at',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('posts'), $columns);
        $this->assertTrue(Schema::hasColumns('posts', $columns));
    }

    /** @test */
    public function a_post_belongs_to_country(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        /** @var Post $post */
        $post = Post::factory()->create(['user_id' => $user]);

        $this->assertEquals($user->id, $post->user_id);
        $this->assertEquals($user->id, $post->user->id);
        $this->assertInstanceOf(User::class, $post->user);
        $this->assertInstanceOf(Relation::class, $post->user());
    }
}
