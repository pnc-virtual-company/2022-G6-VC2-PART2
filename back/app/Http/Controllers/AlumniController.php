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
        $alumni->save();
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
        $alumni ->batch = $request ->batch;
        $alumni ->major = $request ->major;
        $alumni -> address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;
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
        $profile = Alumni::find($id);
        $profile->profile = $request->file('profile')->hashName();
        $request->file('profile')->store('public/images');
        $profile->save();
        return response()->json(['sms'=> $profile]);
    }
}
