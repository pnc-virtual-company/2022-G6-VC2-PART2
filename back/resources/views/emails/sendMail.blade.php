<!DOCTYPE html>
<html>
<head>
    <title>Email Create Account</title>
</head>
<body style="background-color:#EFFFFD;
            padding:10px;
            color:black;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            text-align:center;
            border-radius: 15px;">
    <img src="{{URL::asset('https://o.remove.bg/downloads/0bef752c-3b77-4167-8d5b-9caf17662bdb/unnamed-removebg-preview.png')}}" alt="profile Pic" width="150">
    <p>{{ $sms['title'] }}</p>
    <p>{{ $sms['body'] }}</p>
    <button style="background:#FFFFFF;border:none;padding:8px;border-radius:20px;"><a style="color:black;text-decoration: none;" href="http://localhost:8080" target="_blank">Check here....</a></button>
    <p>Best Regards ,</p>
</body>
</html>