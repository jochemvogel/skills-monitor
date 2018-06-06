<?php

namespace App\Http\Controllers;

use App\Course;
use App\Rubrics;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
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
    public function create() {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:courses',
            'course_abbreviation' => 'nullable|unique:courses',
            'course_code' => 'nullable|unique:courses',
        ]);

        function generateRandomAbbrevation($length = 3) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456';
            $charactersLength = strlen($characters);
            $randomString = '';
            for($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            while(DB::table('courses')->where('course_abbreviation', '=', $randomString)->exists()) {
                $randomString = '';
                for($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
            }
            return $randomString;
        }

        if($request->input('course_abbreviation') != null) {
            $course_abbreviation = $request->input('course_abbreviation');
            $course_abbreviation_boolean = true;
        } else {
            $course_abbreviation = generateRandomAbbrevation();
            $course_abbreviation_boolean = false;
        }


        $course = Course::create([
            'name' => $request->input('name'),
            'course_abbreviation' => $course_abbreviation,
            'course_code' => $request->input('course_code'),
            'real_abbreviation' => $course_abbreviation_boolean,
        ]);

        return redirect()->route('courses.index')->with('success', "The course <strong>$course->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($course_abbreviation) {
        try {
            $courses = Course::All();
            $selectedcourse = null;

            foreach($courses as $course) {
                if(strcasecmp($course->course_abbreviation, $course_abbreviation) === 0) {
                    $selectedcourse = $course;
                }
            }
            if($selectedcourse == null) {
                return redirect(route('courses.index'));
            }

            $rubrics = Rubrics::All()->where('course_id', '=', $selectedcourse->id);

            $params = [
                'course' => $selectedcourse,
                'rubrics' => $rubrics,
            ];

            return view('courses.show')->with($params);
        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        try {
            $course = Course::findOrFail($id);

            $params = [
                'title' => 'Edit Course',
                'course' => $course,
            ];

            return view('courses.edit')->with($params);
        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            $course = Course::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
                'course_abbreviation' => 'nullable|unique:courses,course_abbreviation,'.$id,
                'course_code' => 'nullable|unique:courses,course_code,'.$id,
            ]);

            function generateRandomAbbrevation($length = 3) {
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456';
                $charactersLength = strlen($characters);
                $randomString = '';
                for($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                while(DB::table('courses')->where('course_abbreviation', '=', $randomString)->exists()) {
                    $randomString = '';
                    for($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                }
                return $randomString;
            }

            if($request->input('course_abbreviation') != null) {
                $course_abbreviation = $request->input('course_abbreviation');
                $course_abbreviation_boolean = true;
            } else {
                $course_abbreviation = generateRandomAbbrevation();
                $course_abbreviation_boolean = false;
            }

            $course->name = $request->input('name');
            $course->course_abbreviation = $course_abbreviation;
            $course->course_code = $request->input('course_code');
            $course->real_abbreviation = $course_abbreviation_boolean;

            $course->save();

            return redirect()->route('courses.index')->with('success', "The course <strong>$course->name</strong> has successfully been updated.");
        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    public function delete($id) {
        try {
            $course = Course::findOrFail($id);

            $params = [
                'title' => 'Delete Course',
                'course' => $course,
            ];

            return view('courses.delete')->with($params);
        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {



            return redirect()->route('courses.index')->with('success', "The course <strong>$course->name</strong> has successfully been archived.");
        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    public function add($id) {
        $course = Course::find($id);
        $courses = Course::All();
        $users = User::All();

        $params = [
            'title' => 'Add user',
            'users' => $users,
            'course' => $course,
            'courses' => $courses,
        ];

        return view('courses.add')->with($params);
    }

    public function addUser() {

        try {

            $user_id = request()->post('user');
            $course_id = request()->id;

            $data = array('user_id' => $user_id, "course_id" => $course_id);

            DB::table('course_user')->insert($data);
            $course_code = DB::table('courses')->where('id', '=', $course_id)->first()->course_abbreviation;

            return redirect(route('courses.show', ['id' => $course_code]));

        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }


    public function remove($id) {
        return view('courses.remove');
    }

    public function removeUser($course_id, $user_id) {

        $user = DB::table('users')->where('id', '=', $user_id)->get()->first();

        return view('courses.remove')->with(["user"=>$user]);

    }

    public function destroyUser($course_id, $user_id) {
        try {
        $delete = DB::table('course_user')->where('user_id', '=', $user_id)->where('course_id', '=', $course_id)->delete();
        return redirect()->route('courses.index');

        } catch(ModelNotFoundException $ex) {
            if($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}


