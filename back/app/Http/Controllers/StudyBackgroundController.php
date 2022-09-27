<?php

namespace App\Http\Controllers;

use App\Models\StudyBackground;
use Illuminate\Http\Request;

class StudyBackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudyBackground::with('Alumni')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $study = new StudyBackground();
        $study -> alumni_id = $request -> alumni_id;
        $study -> school = $request -> school;
        $study -> major = $request -> major;
        $study -> start_year = $request -> start_year;
        $study -> end_year = $request -> end_year;
        $study -> profile = $request -> profile;

        $study->save();
        return response()->json(['sms'=>'Created succefully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyBackground  $studyBackground
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return StudyBackground::with('Alumni')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyBackground  $studyBackground
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $study = StudyBackground::findOrFail($id);
        $study -> school = $request -> school;
        $study -> major = $request -> major;
        $study -> start_year = $request -> start_year;
        $study -> end_year = $request -> end_year;
        $study -> profile = $request -> profile;
        $study->save();
        return response()->json(['sms'=>'Update succefully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyBackground  $studyBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return StudyBackground::destroy($id);
    }
    //================== upload school logo ======================
    public function uploadLogo(Request $request, $id){
        $path = public_path('school_logo');
        if(!file_exists($path)) {
            mkdir($path, 0777,true);
        }
        $file = $request->file('school_logo');
        $fileName = uniqid().'_'.trim($file->getClientOriginalName());
        $study=StudyBackground::findOrFail($id);
        $study->school_logo = $fileName;
        $file-> move($path,$fileName);
        $study->school_logo = asset('school_logo/' . $fileName);
        $study->save();
        return response()->json(['sms'=>'upLoad succefully!']);
    }
}
