<?php
namespace App\Http\Controllers;
use App\Models\Alumni;
use Illuminate\Http\Request;
class AlumniController extends Controller
{
    //================== show all alumnis ======================
    public function index()
    {
        return Alumni::with('user')->get();
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
        $alumni ->profile = $request ->profile;
        //======= upload profile image ==========
        $path = public_path('images/alumni');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $alumni->profile = $fileName;
        $alumni->save();
        $file->move($path, $fileName);
        return response()->json(['sms'=>$alumni]);
    }
   //================== show one alumni ======================
    public function show($id)
    {
        return Alumni::with('user')->findOrFail($id);
    }
   //================== Alumni update ======================
    public function update(Request $request, $alumni)
    {
        $alumni= Alumni::find($alumni);
        $alumni -> user_id = $request->user_id;
        $alumni -> gender = $request->gender;
        $alumni ->phone = $request ->phone;
        $alumni ->profile = $request ->profile;
        $alumni ->batch = $request ->batch;
        $alumni ->major = $request ->major;
        $alumni -> address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;

        $path = public_path('images/alumni');
        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }
        $file = $request->file('profile');
        $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        $alumni->profile = $fileName;
        $alumni->save();
        $file->move($path, $fileName);
        return response()->json(['sms'=>$alumni]);
    }
    //================== delete alumni ======================
    public function destroy(Alumni $alumni)
    {
        //
    }
}
