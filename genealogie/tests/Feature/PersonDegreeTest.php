<?php

namespace Tests\Feature;

use App\Models\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PersonDegreeTest extends TestCase
{
    // Si tu veux rafraîchir la base entre les tests :
    // use RefreshDatabase;

    public function test_degree_between_84_and_1265()
    {
        DB::enableQueryLog();

        $timestart = microtime(true);

        $person = Person::findOrFail(84);
        $degree = $person->getDegreeWith(1265);

        $this->assertEquals(13, $degree, "The expected degree is 13");
    }
}
