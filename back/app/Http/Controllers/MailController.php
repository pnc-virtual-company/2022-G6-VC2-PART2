<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use App\Models\User;
use App\Mail\ForgotPasswordInfor;

  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    // Send mail when admin create student
    public function smsMail(Request $request)
    {
        $user = User::findOrFail(1);

        $sms = [
            'title' =>'Hello '. $user->firstName. ',',
            'body' => 'Here is your account and your password is 12345678',
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
