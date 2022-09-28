<?php
namespace App\Http\Controllers;
use App\Models\Alumni;
use Illuminate\Http\Request;
class AlumniController extends Controller
{
    //================== show all alumnis ======================
    public function index()
    {
        return Alumni::with('user','workExperience', 'alumniSkills.Skill','studyBackground')->get();
    }
   //================== add new alumni ======================
    public function store(Request $request, $id)
    {
        $alumni = new Alumni();
        $alumni -> user_id = $id;
        $alumni -> gender = $request->gender;
        $alumni ->phone = $request ->phone;
        $alumni ->telegram = $request ->telegram;
        $alumni ->batch = $request ->batch;
        $alumni ->major = $request ->major;
        $alumni ->address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;
        $alumni ->placeOfBirth = $request ->placeOfBirth;
        $alumni->save();
        return response()->json(['sms'=>$alumni]);
    }
  
   //================== show one alumni ======================
    public function show($id)
    {
        return Alumni::with('user','workExperience', 'alumniSkills.skill','studyBackground')->findOrFail($id);
    }
   //================== Alumni update ======================
    public function update(Request $request, $id)
    {
        $alumni= Alumni::findOrFail($id);
        $alumni ->user_id = $request->user_id; 
        $alumni ->phone = $request ->phone;
        $alumni ->batch = $request ->batch;
        $alumni ->telegram = $request ->telegram;
        $alumni ->major = $request ->major; 
        $alumni -> gender = $request->gender;      
        $alumni -> address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;
        $alumni ->placeOfBirth = $request ->placeOfBirth;
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
    // ============  Check old Password =====================
    public function checkPasswordAlumni(Request $request, $id)
    {
        $user =  User::findOrFail($id);
        if (Hash::check($request->password, $user['password'])) {
            $user->password = $request->new_password;
            $user->save();
            return response()->json(['sms' => 'Password updated!'], 201);
        }
        return response()->json(['sms' => 'Password incorrect!'], 404);
    }
    // ================ Update Password Alumni===============

    public function updatePasswordAlumni(Request $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->password = Alumni::make($request->password);
        $alumni->save();
    }

}
