<?php

namespace Tests\Integration\Models;

use App\Models\Image;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class OneOfManyPolymorphicTest
 *
 * @package \Tests\Integration\Models
 */
class OneOfManyPolymorphicTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_image_model_has_imageable_instance(): void
    {
        /** @var Image $image */
        $image = Image::factory()
                      ->for($user = User::factory()->create(), 'imageable')
                      ->create();


        $this->assertTrue($user->is($image->imageable));
        $this->assertInstanceOf(User::class, $image->imageable);
        $this->assertInstanceOf(MorphTo::class, $image->imageable());
    }

    /** @test */
    public function a_user_has_latest_image(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->assertInstanceOf(Image::class, $user->latestImage); // assert has default object

        /** @var \Illuminate\Database\Eloquent\Collection $images */
        $images = Image::factory()->count(10)->for($user, 'imageable')->create();

        $this->assertTrue($images->last()->is($user->refresh()->latestImage)); // 刷新模型是因为上面变量有缓存
        $this->assertInstanceOf(Image::class, $user->latestImage);
        $this->assertInstanceOf(HasOneOrMany::class, $user->latestImage());
    }

    /** @test */
    public function a_user_has_oldest_image(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->assertInstanceOf(Image::class, $user->oldestImage); // assert has default object

        /** @var \Illuminate\Database\Eloquent\Collection $images */
        $images = Image::factory()->count(10)->for($user, 'imageable')->create();

        $this->assertTrue($images->first()->is($user->refresh()->oldestImage)); // 刷新模型是因为上面变量有缓存
        $this->assertInstanceOf(Image::class, $user->oldestImage);
        $this->assertInstanceOf(HasOneOrMany::class, $user->oldestImage());
    }

    /** @test */
    public function a_user_has_best_image(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->assertInstanceOf(Image::class, $user->bestImage); // assert has default object

        /** @var \Illuminate\Database\Eloquent\Collection $images */
        $best_image = Image::factory()->for($user, 'imageable')->best()->create();
        $worst_image = Image::factory()->for($user, 'imageable')->worst()->create();

        $this->assertTrue($best_image->is($user->refresh()->bestImage)); // 刷新模型是因为上面变量有缓存
        $this->assertInstanceOf(Image::class, $user->bestImage);
        $this->assertInstanceOf(HasOneOrMany::class, $user->bestImage());
    }
}
