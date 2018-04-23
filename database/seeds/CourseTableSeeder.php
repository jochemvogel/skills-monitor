<?php

use Illuminate\Database\Seeder;
use App\Course;
class CourseTableSeeder extends Seeder
{
  public function run()
  {
    $course1 = new Course();
    $course1->name = 'Software Ontwerpen 1';
    $course1->course_abbreviation = 'SON1';
    $course1->course_code = 'CU19638';
    $course1->save();

    $course2 = new Course();
    $course2->name = 'Software Beheren 1';
    $course2->course_abbreviation = 'SBE1';
    $course2->course_code = 'CU19639';
    $course2->save();

    $course3 = new Course();
    $course3->name = 'Infrastructuur Realiseren 1';
    $course3->course_abbreviation = 'IRE1';
    $course3->course_code = 'CU19641';
    $course3->save();

    $course4 = new Course();
    $course4->name = 'Werk- en denkniveau Agile 2a';
    $course4->course_abbreviation = 'WEDAG2a';
    $course4->course_code = 'CU22126';
    $course4->save();

    $course5 = new Course();
    $course5->name = 'Werk- en denkniveau English 2a';
    $course5->course_abbreviation = 'WEDEN2a';
    $course5->course_code = 'CU22541';
    $course5->save();
  }
}

