<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrics;
use App\Course;
use App\Rows;
use App\Field;
use Auth;


use Illuminate\Database\Eloquent\ModelNotFoundException;

class rubricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $rubrics = Rubrics::all();
            return view('rubrics.index', [
                'rubrics' => $rubrics
            ]);
        }catch (ModelNotFoundException $ex){
            if ($ex instanceof ModelNotFoundException){
                return response()->view('errors.'.'404');
            }
        }
        return view('rubrics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        $params = [
            'title' => 'Create Course',
            'courses' => $courses,
        ];

        return view('rubrics.create')->with($params);
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
            'name' => 'required|unique:rubrics',
            'cols' => 'required|Numeric',
            'course' => 'required|Numeric',
        ]);

        $rubrics = Rubrics::create([
            'name' => $request->input('name'),
            'cols' => $request->input('cols'),
            'course_id' => $request->input('course'),
            'user_id' => Auth::user()->id,
        ])->id;

        $row = Rows::create([
            'rubrics_id' => $rubrics,
        ])->id;

        for($i=1;$i<=$request->input('cols'); $i++ ){
             Field::create([
                 'rows_id' => $row,
                 'col' => $i,
                 'content' => '',
             ]);
        }
        return redirect()->route('rubrics.show',['id' => $rubrics]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $rubrics = Rubrics::findOrFail($id);
            $rows = Rows::all()->where('rubrics_id','==',$id)->count();

            return view('rubrics.show', [
                'rubrics' => $rubrics,
                'rows' => $rows,
            ]);
        }catch (ModelNotFoundException $ex){
            if ($ex instanceof ModelNotFoundException){
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
            $rubric = Rubrics::findOrFail($id);
            $courses = Course::all();


            $params = [
                'title' => 'Edit Rubric',
                'rubric' => $rubric,
                'courses' => $courses,
            ];

            return view('rubrics.edit')->with($params);
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
        $rubrics = Rubrics::findOrFail($id);

        try {


            $this->validate($request, [
                'cols' => 'required|Numeric',
            ]);

            $rubrics->course_id = $request->input('course_id');
            $rubrics->cols = $request->input('cols');
            $rubrics->name = $request->input('name');
            $rubrics->save();

            return redirect()->route('rubrics.index')->with('success', "The rubric <strong>$rubrics->name</strong> has successfully been updated.");
        }
        catch (ModelNotFoundException $ex)
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }


        $rows = Rows::all()->where('rubrics_id','==',$id)->count();


        if($rows < $request->input('rows')){
            $row = Rows::create([
                'rubrics_id' => $id,
            ]);

            for ($col=1;$col<=$rubrics->cols;$col++){
                factory(Field::class)->create(['rows_id' => $row->id, 'col' => $col]);
            }
        }elseif ($rows > $request->input('rows')){
            $row = Rows::all()->where('rubrics_id','=',$rubrics->id)->pop();
            foreach(Field::all()->where('rows_id','=', $row->id) as $field){
                $field->delete();
            }
            $row->delete();
        }


        return redirect()->route('rubrics.show',['id' => $id]);
    }

    public function delete($id)
    {
        try
        {
            $rubric = Rubrics::findOrFail($id);

            $params = [
                'title' => 'Delete Rubric',
                'rubric' => $rubric,
            ];

            return view('rubrics.delete')->with($params);
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
            $rubric = Rubrics::findOrFail($id);

            $rubric ->delete();

            return redirect()->route('rubrics.index')->with('success', "The rubric <strong>$rubric->name</strong> has successfully been archived.");
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
