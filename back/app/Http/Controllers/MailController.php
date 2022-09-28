<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Models\User;
use App\Mail\ForgotPasswordInfor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    //===================== Send mail when admin create student ========================
    public function smsMail($id,$password)
    {
        $user = User::findOrFail($id);
        $sms = [
            'title' =>'Hello '. $user->firstName. ',',
            'body' => 'Here is your account '. $user->email.' and your password is: '. $password,
        ];
         
        Mail::to($user->email)->send(new SendMail($sms));
           
        return("Email is sent successfully.");
    } 
    // ============Send Email When User Forget Password===========
    public function sendMailResetPassword($details){
        Mail::to($details->email)->send(new ForgotPasswordInfor($details));
   
        if (Mail::flushMacros()) {
             return Response()->json(['fail' => 'Sorry! Please try again latter'], 401);
        }else{
             return response()->json(['success', 'Great! Successfully send in your mail'], 201);
        }
    }   
}
