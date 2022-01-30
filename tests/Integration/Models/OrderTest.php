<?php
namespace Tests\Integration\Models;

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
}
