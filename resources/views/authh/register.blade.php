<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="wrapper">
    <h2>Registration</h2>
    <form action="{{ route('register.process') }}" method="POST"> 
        @csrf 
        <div class="input-box">
            <input type="text"  id="name" name="name" placeholder="Enter your name" required>
            
        </div>
        <div class="input-box">
            <input type="text" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
            <input type="password"  id="password" name="password" placeholder="Create password" required>
        </div>
        <div class="input-box">
            <input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm password" required>
        </div>
        <div class="policy">
            <input type="checkbox">
            <h3>I accept all terms & condition</h3>
        </div>
        <div class="input-box button">
            <input type="Submit" value="Register Now">
        </div>
        <div class="text">
            <h3>Already have an account? <a href="#">Login now</a></h3>
        </div>
    </form>
</div>
</body>
</html>
