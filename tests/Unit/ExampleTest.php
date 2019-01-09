<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        /** @var \App\Cleaner $NORMAL_CLEANER */
        $NORMAL_CLEANER = factory(\App\Cleaner::class)->create();

        /** @var \App\Cleaner $SECOND_CLEANER */
        $SECOND_CLEANER = factory(\App\Cleaner::class)->create();

        $houses = \App\House::all();

        /** @var \App\House $firstHouse */
        $firstHouse = $houses->first();

        $firstHouse->cleaners()->attach($NORMAL_CLEANER->id);

        $houses->each(function (\App\House $house) use ($SECOND_CLEANER) {
            $house->cleaners()->attach($SECOND_CLEANER->id);
        });

        $this->assertTrue(true);
    }
}
