<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WorkExperience::with('alumni')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work = new WorkExperience();
        $work -> alumni_id = $request -> alumni_id;
        $work -> company = $request -> company;
        $work -> position = $request -> position;
        $work -> start_year = $request -> start_year;
        $work -> end_year = $request -> end_year;
        $work -> company_link = $request -> company_link;
        $work->save();
        return response()->json(['sms'=>'Created succefully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $workExperience= WorkExperience::findOrFail($id);
        $workExperience -> alumni_id = $request->alumni_id;
        $workExperience ->company = $request ->company;
        $workExperience ->position = $request ->position;
        $workExperience ->start_year = $request ->start_year;
        $workExperience ->end_year = $request ->end_year;
        $workExperience -> company_link = $request -> company_link;
        $workExperience->save();
        return response()->json(['sms'=> 'AlumniWork Update Successfully!', 'data' => $workExperience], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkExperience  $workExperience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iSDelete = WorkExperience::destroy($id);
        if ($iSDelete === 1) {
            return response()->json(['message' => 'AlumniWork deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'AlumniWork cannot delete'], 404);
        }
       
    }
}
