<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rubrics;
use App\Rows;
use App\Field;

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
        $id = 2;
        try {
            $rubrics = Rubrics::findOrFail($id);
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
        return view('rubrics.create');
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
        ]);

        $rubrics = Rubrics::create([
            'name' => $request->input('name'),
            'cols' => $request->input('cols'),
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
            return view('rubrics.show', [
                'rubrics' => $rubrics
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
        //
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

        $this->validate($request, [
            'cols' => 'required|Numeric',
        ]);

        $rubrics->cols = $request->input('cols');
        $rubrics->save();

        return redirect()->route('rubrics.show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
