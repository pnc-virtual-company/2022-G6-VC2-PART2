<?php

namespace App\Http\Controllers;

use App\Models\AlumniExperience;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class AlumniExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlumniExperience::with('experience', 'alumni')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumniExperience = new AlumniExperience();
        $alumniExperience -> alumni_id = $request -> alumni_id;
        $alumniExperience -> work_experience_id = $request -> work_experience_id;
        $alumniExperience -> save();
        return response()->json(['sms'=>$alumniExperience]);    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniExperience  $alumniExperience
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniExperience $alumniExperience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniExperience  $alumniExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniExperience $alumniExperience)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniExperience  $alumniExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        return AlumniExperience::destroy($id);
    }
}
