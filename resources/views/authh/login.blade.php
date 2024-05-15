<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="wrapper">
    <h2>Log In </h2>
    <form action="{{ route('login.process') }}" method="POST"> 
        @csrf 
      
        <div class="input-box">
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
            <input type="password"  id="password" name="password" placeholder="Enter password" required>
        </div>
       
        <div class="input-box button">
            <input type="Submit" value="Log In">
        </div>
        <div class="text">
            <h3>Do not Register yet? <a href="#">Register Now</a></h3>
        </div>
    </form>
</div>
</body>
</html>
