<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="login-body">
    <div class="login-page">
        <button class="tutup-btn" onclick='window.location.href="<?php echo e(url("/")); ?>"'>✕</button>
        
        <h1>Login</h1>

        <div class="login-form">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">

            <div class="login-options">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <a href="<?php echo e(url('/forgetpass')); ?>">Forgot Password?</a>
            </div>

            <button onclick='window.location.href="<?php echo e(url("/mainpage")); ?>"'>Log in</button>
        </div>

        <div class="register">
            <p>Don't have an account? <a href="<?php echo e(url('/register')); ?>">Register</a></p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\secprog\SecPro\FrontEndSec\resources\views/login.blade.php ENDPATH**/ ?>