<?php

namespace Tests\Integration\Models;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

/**
 * Class OrderTest
 *
 * @package \Tests\Integration\Models
 */
class OrderTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_orders_table(): void
    {
        $this->assertTrue(Schema::hasTable('orders'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'user_id',
            'name',
            'price',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('orders'), $columns);
        $this->assertTrue(Schema::hasColumns('orders', $columns));
    }

    /** @test */
    public function an_order_belongs_to_a_user(): void
    {
        /** @var \App\Models\User $user */
        $user = User::factory()->create();
        $order = Order::factory()->create(['user_id' => $user]);

        $this->assertEquals($user->id, $order->user_id);
        $this->assertEquals($user->id, $order->user->id);
        $this->assertInstanceOf(User::class, $order->user);
        $this->assertInstanceOf(Relation::class, $order->user());
    }
}
