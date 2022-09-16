<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    // ==================login user===========================
    public function userLogin(Request $request){
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        if(!$user || !Hash::check($request->password, $user->password))
        {   
            return response()->json(['sms'=>'invalid', 'email'=> $request->email, 'password'=> $request->password], 404);
        }
        $token = $user->createToken('myToken', ['user'])->plainTextToken;
        $user->save();
        return response()->json(['token'=> $token, 'user'=> $user], 202);
    }
    // ===================Log out===============================
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['sms'=>'logged out']);
    }
}
