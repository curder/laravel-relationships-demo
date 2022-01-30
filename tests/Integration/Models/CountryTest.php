<?php
namespace Tests\Integration\Models;

use App\Models\Country;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_countries_table(): void
    {
        $this->assertTrue(Schema::hasTable('countries'));
    }

    /** @test */
    public function it_has_some_columns(): void
    {
        $columns = [
            'id',
            'name',
            'display_name',
            'created_at',
            'updated_at',
        ];

        $this->assertSame(Schema::getColumnListing('countries'), $columns);
        $this->assertTrue(Schema::hasColumns('countries', $columns));
    }
}
