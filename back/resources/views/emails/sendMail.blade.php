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
                              <img src="https://www.passerellesnumeriques.org/misc/logo-en.png" width="120px" class="CToWUd"/> 
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
                                        {{ $sms['body'] }}
                                        <br>
                                        <br>
                                        <button style="border:none;padding:10px;background-color: #F4F9F9;border-radius:10px 10px 0px 0px;"><a style="color:black;text-decoration: none;" href="http://localhost:8080" target="_blank">Check here....</a></button>
                                    </span > 
                                   </td>
                                
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