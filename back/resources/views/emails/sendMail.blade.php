<!-- <!DOCTYPE html>
<html>
<head>
    <title>Email Create Account</title>
</head>
<body style="background-color:#EFFFFD;
            padding:10px;
            color:black;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;
            text-align:center;
            border-radius: 15px;">
    <img src="{{URL::asset('https://www.passerellesnumeriques.org/wp-content/uploads/2019/03/PN-Cambodia-Alumni-Association.png')}}" alt="profile Pic" width="150">
    <p style="font-size:23px;">{{ $sms['title'] }}</p>
    <p>{{ $sms['body'] }}</p>
    <button style="background:#FFFFFF;border:none;padding:8px;border-radius:5px;"><a style="color:black;text-decoration: none;" href="http://localhost:8080" target="_blank">Check here....</a></button>
    <p>Best Regards ,</p>
</body>
</html> -->
<!DOCTYPE html>
<html>
<head>
    <title>Email Create Account</title>
</head>
   <body style="font-family: Arial; margin: 0; font-size: 22px">
      <table style=" background-color: #F4F9F9; padding: 16px 16px; min-height: 50vh; width: 80%; margin: 0 auto;" >
               <td style="vertical-align: top">
                  <table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="margin: auto; border-spacing: 0; border-collapse: collapse; background: white; border-radius: 8px; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px; display: block;" >
                     <tbody>        
                        <tr style="background-size: cover">
                           <td style=" width: 70%; text-align: left; border-collapse: collapse; background: #fff; border-radius: 10px 10px 0px 0px; color: white; height: 50px; " > 
                              <img src="https://o.remove.bg/downloads/7437d945-6fab-4b80-af39-443bbcf68862/unnamed-removebg-preview.png" width="120px" class="CToWUd"/> 
                           </td>
                        </tr>
                        <td style="vertical-align: top; border-collapse: collapse">
                           <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#F8F8F8" style="border-spacing: 0; border-collapse: collapse" >
                             <tbody style="font-size: 14px;">
                                <tr>
                                   <td style=" padding-top: 30px; padding-bottom: 5px; background-color: white; " ><span style="color: #363636" >Dear <b> User,</b></span > </td>
                                </tr>
                                <tr>
                                   <td style=" padding-top: 5px; padding-bottom: 9px; background-color: white; " > 
                                   <span style="color: #363636;" >
                                        {{ $sms['title'] }}
                                        <br>
                                        {{ $sms['body'] }}
                                        <br>
                                        <!-- <br>
                                        <span style="font-weight: bold; font-size: 22px; color: #0062ff;">{{$details['verify_code']}}</span>
                                        <br> -->
                                        <!-- <br>
                                        Copy this code above 👆 and enter the verify code on app. -->
                                    </span > 
                                   </td>
                                </tr>
                                <tr>
                                    <!-- <td style="background: #ffffff; height: 20px">
                                       Thank you 🙏
                                    </td> -->
                                    <button style="background:#FFFFFF;border:none;padding:8px;border-radius:5px;"><a style="color:black;text-decoration: none;" href="http://localhost:8080" target="_blank">Check here....</a></button>
                                </tr>
                              </tbody>
                           </table>
                        </td>
                     </tbody>
                  </table>
               </td>
          </table>
      </body>
   <html>