<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ero;
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
        $ero = Ero::where('email', "=", $request->email)->first();
        if ($user || $ero ){
            if ($user){
                $user->verify_code = $request->verify_code;
                $user->save();
            }
            else if ($ero){
                $ero ->verify_code = $request->verify_code;
                $ero ->save();
            }
            (new MailController)-> sendMailResetPassword($request);
            $response = [
                'success' => true,
            ];
        }else{
            $response = [
                'success' => false,
                'message'=> "Email not found"
            ];
        }
        return Response()->json($response);
    }
    public function resetForgotPassword(Request $request,User $user){
        $user = User::where('email', $request->email)->first();
        
        $ero = Ero::where('email',$request->email)->first();
        
        if ($user){
            $user->password = Hash::make($request->new_password);
            $user->save();
        }
        else if ($ero){
            $ero->password = Hash::make($request->new_password);
            $ero->save();
        }

        $response = [
            'message' => "Reset password success"
        ];
        return response()->json($response , 202);
    }

    public function getVerifyCode(Request $request){
        $user = User::where('verify_code', '=', $request->verify_code)->first();
        $ero = Ero::where('verify_code', '=', $request->verify_code)->first();
        if ($user || $ero){
            if ($user){
                $user->verify_code = 'Null';
                $user->save();
            }else{
                $ero->verify_code = 'Null';
                $ero->save();
            }
            $response = [
                'status' => true,
                'message' => 'Confirmed code'
            ];
        } 
        else {
            $response = [
                'status' => false,
                'message' => 'This code not confirmed'
            ];
        }

        return Response()->json($response);
    }

}
