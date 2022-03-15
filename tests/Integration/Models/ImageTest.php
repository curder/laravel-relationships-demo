<?php
namespace Tests\Integration\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Image;
use Illuminate\Support\Facades\Schema;

/**
 * @see Image
 */
class ImageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function images_database_has_expected_columns(): void
    {
        $this->assertTrue(Schema::hasColumns('images', [
            'id', "url", "imageable_id", "imageable_type"
        ]));
    }

    /** @test */
    public function an_image_can_be_uploaded_by_a_user(): void
    {
        $user = User::factory()->create();

        // morphedTo a USER
        $image = Image::factory()->create([
            "imageable_id" => $user,
            "imageable_type" => User::class,
        ]);

        $this->assertInstanceOf(User::class, $image->imageable);
        $this->assertTrue($image->imageable->is($user));
    }

    /** @test */
    public function an_image_can_be_uploaded_for_a_post(): void
    {
        $post = Post::factory()->create();

        // morphedTo a POST
        $image = Image::factory()->create([
            "imageable_id" => $post,
            "imageable_type" => Post::class,
        ]);

        $this->assertInstanceOf(Post::class, $image->imageable);
        $this->assertTrue($image->imageable->is($post));
    }
}
