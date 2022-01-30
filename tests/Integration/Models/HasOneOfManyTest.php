<?php
namespace Tests\Integration\Models;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * Class HasOneOfManyTest
 *
 * @package \Tests\Integration\Models
 */
class HasOneOfManyTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
   public function a_user_has_latest_order(): void
   {
       /** @var User $user */
       $user = User::factory()->create();
       $this->assertInstanceOf(Order::class, $user->latestOrder); // assert has default object

       /** @var \Illuminate\Database\Eloquent\Collection $orders */
       $orders = Order::factory()->count(10)->for($user)->create();

       $this->assertTrue($orders->last()->is($user->refresh()->latestOrder)); // 刷新模型是因为上面变量有缓存
       $this->assertInstanceOf(Order::class, $user->latestOrder);
       $this->assertInstanceOf(HasOneOrMany::class, $user->latestOrder());
   }

    /** @test */
    public function a_user_has_oldest_order(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->assertInstanceOf(Order::class, $user->oldestOrder); // assert has default object

        /** @var \Illuminate\Database\Eloquent\Collection $orders */
        $orders = Order::factory()->count(10)->for($user)->create();

        $this->assertTrue($orders->first()->is($user->refresh()->oldestOrder)); // 刷新模型是因为上面变量有缓存
        $this->assertInstanceOf(Order::class, $user->oldestOrder);
        $this->assertInstanceOf(HasOneOrMany::class, $user->oldestOrder());
    }

    /** @test */
    public function a_user_has_largest_order(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $this->assertInstanceOf(Order::class, $user->largestOrder); // assert has default object

        $largest_order = Order::factory()->for($user)->create(['price' => 9999.99,]);
        $smallest_order =Order::factory()->for($user)->create(['price' => 0.11]);

        $this->assertTrue($largest_order->is($user->refresh()->largestOrder)); // 刷新模型是因为上面变量有缓存
        $this->assertInstanceOf(Order::class, $user->largestOrder);
        $this->assertInstanceOf(HasOneOrMany::class, $user->largestOrder());
    }
}
