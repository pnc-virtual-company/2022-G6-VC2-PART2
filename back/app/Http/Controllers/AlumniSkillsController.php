<?php

namespace App\Http\Controllers;

use App\Models\AlumniSkills;
use Illuminate\Http\Request;

class AlumniSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlumniSkills::with('skill', 'alumni')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumniSkill = new AlumniSkills();
        $alumniSkill -> alumni_id = $request -> alumni_id;
        $alumniSkill -> skill_id = $request -> skill_id;
        $alumniSkill -> save();
        return response()->json(['sms'=>$alumniSkill]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniSkills  $alumniSkills
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniSkills $alumniSkills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniSkills  $alumniSkills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniSkills $alumniSkills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniSkills  $alumniSkills
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniSkills $alumniSkills)
    {
        //
    }
}
