<?php

namespace App\Http\Controllers;

use App\Role;
use App\Rubrics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JSONcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function updateField(Request $request){
        DB::table('fields')->where('id', '=', $request->input('id'))->update([
            'content' => $request->input('content'),
        ]);
    }

    public function backupField(Request $request){
        DB::table("pending_changes")->insert([
            "content" => $request->input('content'),
            "field_id" => $request->input('id'),
        ]);
    }

    public function getPending(Request $request){
        $hasPending = DB::table('pending_changes')->where('field_id', '=', $request->input('id'))->first()->content;
        DB::table('pending_changes')->where('field_id', '=', $request->input('id'))->delete();
        return $hasPending;
    }
}
