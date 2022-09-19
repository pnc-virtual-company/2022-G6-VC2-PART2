<?php

namespace App\Http\Controllers;

use App\Models\AlumniStudyBackground;
use Illuminate\Http\Request;

class AlumniStudyBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlumniStudyBackground::with('studyBackground', 'alumni')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumniStudyBackground = new AlumniStudyBackground();
        $alumniStudyBackground -> alumni_id = $request -> alumni_id;
        $alumniStudyBackground -> study_background_id = $request -> study_background_id;
        $alumniStudyBackground -> save();
        return response()->json(['sms'=>$alumniStudyBackground]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlumniStudyBackground  $alumniStudyBackground
     * @return \Illuminate\Http\Response
     */
    public function show(AlumniStudyBackground $alumniStudyBackground)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlumniStudyBackground  $alumniStudyBackground
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlumniStudyBackground $alumniStudyBackground)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlumniStudyBackground  $alumniStudyBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlumniStudyBackground $alumniStudyBackground)
    {
        //
    }
}
