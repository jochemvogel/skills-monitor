<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Rubrics;

class RubricTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRubricsCanBeCreated()
    {
        $user = factory(Rubrics::class)->create();

        $rubric = $user->rubrics()->create([
            'name'=> 'Test rubric',
            'cols' => 5,
            'course_id' => 1,
            'user_id' => 1,
        ]);

        $found_rubric = Rubrics::find(1);

        $this->assertsEquals($found_rubric->name, 'Test rubric');
        $this->assertsEquals($found_rubric->cols, 5);
        $this->assertsEquals($found_rubric->course_id, 1);
        $this->assertsEquals($found_rubric->user_id, 1);

        $this->seeInDatabase('rubrics', ['id'=>1, 'name'=>'Test rubric', 'cols'=>5, 'course_id'=>1, 'user_id'=>1]);
    }
}
