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
        $car = Car::factory()->for($mechanic = Mechanic::factory()->create())->create();
        $owner = Owner::factory()->for($car)->create();

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
        $car = Car::factory()->for($mechanic = Mechanic::factory()->create())->create();

        $this->assertTrue($mechanic->is($car->mechanic));
        $this->assertInstanceOf(Mechanic::class, $car->mechanic);
        $this->assertInstanceOf(Relation::class, $car->mechanic());
    }

    /** @test */
    public function a_owner_belongs_to_a_car(): void
    {
        /** @var Owner $owner */
        $owner = Owner::factory()->for($car = Car::factory()->create())->create();

        $this->assertTrue($car->is($owner->car));
        $this->assertInstanceOf(Car::class, $owner->car);
        $this->assertInstanceOf(Relation::class, $owner->car());
    }
}
