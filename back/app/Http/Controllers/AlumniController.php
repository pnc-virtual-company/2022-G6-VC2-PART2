<?php
namespace App\Http\Controllers;
use App\Models\Alumni;
use Illuminate\Http\Request;
class AlumniController extends Controller
{
    //================== show all alumnis ======================
    public function index()
    {
        return Alumni::with('user','WorkExperience','StudyBackground')->get();
    }
   //================== add new alumni ======================
    public function store(Request $request)
    {
        $alumni = new Alumni();
        $alumni -> user_id = $request->user_id;
        $alumni -> gender = $request->gender;
        $alumni ->phone = $request ->phone;
        $alumni ->batch = $request ->batch;
        $alumni ->major = $request ->major;
        $alumni -> address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;
        $alumni ->placeOfBirth = $request ->placeOfBirth;
        $alumni->save();
        return response()->json(['sms'=>$alumni]);
    }
   //================== show one alumni ======================
    public function show($id)
    {
        return Alumni::with('user','WorkExperience','StudyBackground')->findOrFail($id);
    }
   //================== Alumni update ======================
    public function update(Request $request, $id)
    {
        $alumni= Alumni::find($id);
        $alumni ->phone = $request ->phone;
        $alumni ->batch = $request ->batch;
        $alumni ->major = $request ->major;       
        $alumni -> address = $request ->address;
        $alumni->save();
        return response()->json(['sms'=>$alumni]);
    }
    //================== delete alumni ======================
    public function destroy(Alumni $alumni)
    {
        //
    }
    //================== upload profile ======================
    public function uploadProfile(Request $request, $id){
        $path = public_path('profile');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');

        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $fileName);
        $alumni = Alumni::findOrFail($id);
        $alumni->profile = asset('profile/' . $fileName);
        $alumni->save();
        return response()->json(['sms' => $alumni]);
    }
}
