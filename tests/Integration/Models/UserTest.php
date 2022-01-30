<?php

namespace Tests\Integration\Models;

use App\Models\Country;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_users_table(): void
    {
        $this->assertTrue(Schema::hasTable('users'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'country_id',
            'name',
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('users'), $columns);
        $this->assertTrue(Schema::hasColumns('users', $columns));
    }

    /** @test */
    public function a_user_belongs_to_country(): void
    {
        /** @var Country $country */
        $country = Country::factory()->create();
        /** @var User $user */
        $user = User::factory()->create(['country_id' => $country]);

        $this->assertTrue($country->is($user->country));
        $this->assertInstanceOf(Country::class, $user->country);
        $this->assertInstanceOf(BelongsTo::class, $user->country());
    }

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
}
