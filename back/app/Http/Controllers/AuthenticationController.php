<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;

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

    // ===============Forget Password============================

    public function forgotPassword(Request $request){   
        $user = User::where('email', "=", $request->email)->first();
        if ($user){
            if ($user){
                $user->verify_code = $request->verify_code;
                $user->save();
            }
            (new MailController)-> sendMailResetPassword($request);
            return Response()->json(['sms'=>'Success'], 202);
        }else{
            return response()->json(['sms'=> 'invalid email'], 404);
        }
        return Response()->json($response);
    }

    // ===============New password after verify code================

    public function resetForgotPassword(Request $request,User $user){
        $user = User::where('email', "=", $request->email)->first();
        if ($user){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['sms'=> true], 202);
        } else {
            return response()->json(['sms'=> false], 404);
        }
    }

    // ================Get code from gmail===========================

    public function getVerifyCode(Request $request){
        $user = User::where('verify_code', '=', $request->verify_code)->first();
        if ($user){
            if ($user){
                $user->verify_code = 'Null';
                $user->save();
            }
            return response()->json(['sms'=> true], 202);
        }
        else {
            return response()->json(['sms'=> false], 404);
        }
    }

}
