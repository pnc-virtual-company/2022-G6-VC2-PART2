<!DOCTYPE html>
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
</html>