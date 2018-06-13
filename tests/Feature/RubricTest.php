<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RubricTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRubricsCanBeCreated()
    {
        $user = factory(App\User::class)->create();

        $rubric = $user->rubrics()->create([
            'name'=> 'Test rubric',
            'cols' => 5,
            'course_id' => 1,
            'user_id' => 1,
        ]);

        $found_rubric = Rubric::find(1);

        $this->assertsEquals($found_rubric->name, 'Test rubric');
        $this->assertsEquals($found_rubric->cols, 5);
        $this->assertsEquals($found_rubric->course_id, 1);
        $this->assertsEquals($found_rubric->user_id, 1);





    }
}
