<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return response()->json(['sms'=>$user]);
    }
   //================== show one user ======================
    public function show($id)
    {
        return User::findOrFail($id);
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

    // ====================Send Email When User Create Account================
    // Send mail when admin create student
    public function smsMail(Request $request)
    {
        // $user = User::findOrFail(1);

        $sms = [
            'title' => 'Dear ',
            'body' => 'Here is your account of 
                Student Management Leave System and password is 12345678',
        ];
         
        Mail::to('sreyne.ven@student.passerellesnumeriques.org ')->send(new SendMail($sms));
           
        return("Email is sent successfully.");
    }
}
