<?php

namespace App\Http\Controllers;

use App\Course;
use App\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        $params = [
            'title' => 'Course Listing',
            'courses' => $courses,
        ];

        return view('courses.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $course = Course::create([
            'name' => $request->input('name'),
            'course_abbreviation' => $request->input('course_abbreviation'),
            'course_code' => $request->input('course_code'),
        ]);

        return redirect()->route('courses.index')->with('success', "The course <strong>$course->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $courses = Course::findOrFail($id);
            $rubrics = Rubrics::All()->where('course_id', '=', $id);

            $params = [
                'title' => 'Delete Course',
                'courses' => $courses,
                'rubrics' => $rubrics,
            ];

            return view('courses.show')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $course = Course::findOrFail($id);

            $params = [
                'title' => 'Edit Course',
                'course' => $course,
            ];

            return view('courses.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $course = Course::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
            ]);

            $course->name = $request->input('name');
            $course->course_abbreviation = $request->input('course_abbreviation');
            $course->course_code = $request->input('course_code');

            $course->save();

            return redirect()->route('courses.index')->with('success', "The course <strong>$course->name</strong> has successfully been updated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $course = Course::findOrFail($id);

            $course->delete();

            return redirect()->route('courses.index')->with('success', "The course <strong>$course->name</strong> has successfully been archived.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
}


