<?php

namespace Tests\Integration\Models;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

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
            'id', "url", "imageable_id", "imageable_type",
        ]));
    }

    /** @test */
    public function an_image_can_be_uploaded_by_a_user(): void
    {
        $image = Image::factory()
                      ->for($user = User::factory()->create(), 'imageable')
                      ->create();

        $this->assertInstanceOf(User::class, $image->imageable);
        $this->assertTrue($image->imageable->is($user));
    }

    /** @test */
    public function an_image_can_be_uploaded_for_a_post(): void
    {
        $image = Image::factory()
                      ->for($post = Post::factory()->create(), 'imageable')
                      ->create();

        $this->assertInstanceOf(Post::class, $image->imageable);
        $this->assertTrue($image->imageable->is($post));
    }
}
