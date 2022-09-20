<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EroController;
use Mail; 
use App\Mail\SendMail;

class UserController extends Controller
{
    //================== show all users ======================
    public function index()
    {
        return User::get();
    }
   //================== add new user ======================
    public function store(Request $request)
    {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role= $request->role;
        $user->save();
        if($user->role=='ero'){
            (new EroController)->store($request, $user->id);
            (new MailController)->smsMail($user->id,$request->password);
        }else if($user->role=='alumni'){
            (new MailController)->smsMail($user->id,$request->password);
        }
        return response()->json(['sms'=>$user]);
    }
   //================== show one user ======================
    public function show($id)
    {
        return User::with('alumni')->findOrFail($id);
    }
   //================== update user ======================
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->save();
        return response()->json(['sms'=>$user]);
    }
    //================== delete user ======================
    public function destroy($id)
    {
        //
    }
    // ===================Log out===============================
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'logged out']);
    }

    // ========Update new password after forget password =================

}
