<?php

namespace Tests\Itegration\Models;

use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HasOneThroughTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_mechanic_has_one_owner_through_car(): void
    {
        /** @var \App\Models\Mechanic $mechanic */
        $mechanic = Mechanic::factory()->create();
        $car = Car::factory()->create(['mechanic_id' => $mechanic]);
        $owner = Owner::factory()->create(['car_id' => $car]);

        $this->assertInstanceOf(Owner::class, $mechanic->carOwner()->first());
        $this->assertTrue($owner->is($mechanic->carOwner));
        $this->assertInstanceOf(Owner::class, $mechanic->carOwner);
        $this->assertInstanceOf(HasOneThrough::class, $mechanic->carOwner());
        $this->assertEquals($owner->id, $mechanic->carOwner()->first()->id);
        $this->assertCount(1, $mechanic->carOwner()->get());
    }

    /** @test */
    public function a_car_belongs_to_a_mechanic(): void
    {
        /** @var Car $car */
        $mechanic = Mechanic::factory()->create();
        $car = Car::factory()->create(['mechanic_id' => $mechanic]);

        $this->assertTrue($mechanic->is($car->mechanic));
        $this->assertInstanceOf(Mechanic::class, $car->mechanic);
        $this->assertInstanceOf(Relation::class, $car->mechanic());
    }

    /** @test */
    public function a_owner_belongs_to_a_car(): void
    {
        $car = Car::factory()->create();
        $owner = Owner::factory()->create(['car_id' => $car]);

        $this->assertTrue($car->is($owner->car));
        $this->assertInstanceOf(Car::class, $owner->car);
        $this->assertInstanceOf(Relation::class, $owner->car());
    }
}
