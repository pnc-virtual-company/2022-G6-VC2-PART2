<?php
namespace App\Http\Controllers;
use App\Http\Controllers\UplaodImageController;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
class WorkExperienceController extends Controller
{
    //===================== show all alumni work experience =================
    public function index()
    {
        return WorkExperience::with('alumni')->get();
    }
    //===================== add alumni work experience =================
    public function store(Request $request)
    {
        $work = new WorkExperience();
        $work -> alumni_id	= $request -> alumni_id;
        $work -> company = $request -> company;
        $work -> position = $request -> position;
        $work -> start_year = $request -> start_year;
        $work -> end_year = $request -> end_year;
        $work -> company_link = $request -> company_link;
        $work -> duration = $request -> duration;
        $work -> profile = $request -> profile;
        $work->save();
        return response()->json(['sms'=>'Created succefully!']);
    }
   //===================== show one alumni work experience =================
    public function show($id)
    {
        return WorkExperience::findOrFail($id);
    }
  //===================== update alumni work experience =================
    public function update(Request $request, $id)
    {
        $workExperience= WorkExperience::findOrFail($id);
        $workExperience -> company = $request -> company;
        $workExperience -> position = $request -> position;
        $workExperience -> start_year = $request -> start_year;
        $workExperience -> end_year = $request -> end_year;
        $workExperience -> company_link = $request -> company_link;
        $workExperience -> duration = $request -> duration;
        $workExperience -> profile = $request -> profile;

        $workExperience->save();
        return response()->json(['sms'=> 'AlumniWork Update Successfully!', 'data' => $workExperience], 200);
    }
    //===================== delete alumni work experience =================
    public function destroy($id)
    {
        $iSDelete = WorkExperience::destroy($id);
        if ($iSDelete === 1) {
            return response()->json(['message' => 'AlumniWork deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'AlumniWork cannot delete'], 404);
        }
    }

    //================== upload profile ======================
    public function uploadCompanyProfile(Request $request, $id){
        $workExperience = WorkExperience::findOrFail($id);
        $workExperience -> profile = (new UplaodImageController)->uploadProfile($request);
        $workExperience->save();
        return response()->json(['sms' => $workExperience]);
    }
}
