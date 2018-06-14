<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Rubrics;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *R
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testThatWeCanGetRubricName() {

        $rubric = new Rubrics();

        $this->assertEquals($rubric->getName(), 'Test rubric');

    }




    }

