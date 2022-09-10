<?php
namespace App\Http\Controllers;
use App\Models\Alumni;
use Illuminate\Http\Request;
class AlumniController extends Controller
{
    //================== show all alumni ======================
    public function index()
    {
        return Alumni::with('user')->get();
    }
   //================== add new alumni ======================
    public function store(Request $request)
    {
        $alumni = new Alumni();
        $alumni -> user_id = $request->user_id;
        $alumni ->phone = $request ->phone;
        $alumni ->profile = $request ->profile;
        $alumni ->generation = $request ->generation;
        $alumni ->major = $request ->major;
        $alumni -> address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;
        $alumni -> save();

        return response()->json(['sms'=>$alumni]);
    }
   //================== show one alumni ======================
    public function show($id)
    {
        return Alumni::with('user')->findOrFail($id);
    }
   //================== Alumni update ======================
    public function update(Request $request, Alumni $alumni)
    {
       Alumni::find($alumni);
        $alumni -> user_id = $request->user_id;
        $alumni ->phone = $request ->phone;
        $alumni ->profile = $request ->profile;
        $alumni ->generation = $request ->generation;
        $alumni ->major = $request ->major;
        $alumni -> address = $request ->address;
        $alumni ->dateOfBirth = $request ->dateOfBirth;
        $alumni -> save();

        return response()->json(['sms'=>$alumni]);
    }
    //================== delete alumni ======================
    public function destroy(Alumni $alumni)
    {
        //
    }
}
