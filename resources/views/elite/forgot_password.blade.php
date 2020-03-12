<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pikup - Forget Password</title>
</head>

<body>
    <img src="{{ asset('asserts/images/logo.png') }}" alt="logo" height="35px;" width="120px">
    <p>Yout token is: <a href="{{route('forgot_password_validate', ['c' => $token ])}}">Reset password</a></p>
</body>

</html>