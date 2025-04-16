<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiLєє - landscape</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <img src="imgs\Bg1-removebg-preview.png" class="bg1">
    <img src="imgs\Bg_2-removebg-preview.png" class="bg2">
    <img src="imgs\sparkle_1-removebg-preview.png" class="sp1">
    <img src="imgs\sparkle_2-removebg-preview.png" class="sp2">
    
    <div class="container" id="login-page">
        <div class="logo">
            <img src="imgs/hilee-logo.png" alt="Logo" width="80px" height="50px">
            <br>
            <h1>HiLєє</h1>
        </div>

        <h2>WELCOME!</h2>
        <?php if (isset($_SESSION["Sreg"]) && $_SESSION["Sreg"] == true):
            $_SESSION["Sreg"] = false; ?>
            <h3 style="margin: 0; color: white;">Sign Up Success! Login In now!</h3>
        <?php endif; ?>

        <form action="Signup.php" method="post">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input name="Email" type="text" id="username" placeholder="Email">
            </div>

            <div class="input-group">
                <input name="password" type="password" id="password" placeholder="Password">
                <i class="fas fa-lock toggle-icon" onclick="togglePassword('password', this)"></i>
            </div>

            <?php if (isset($_SESSION["icreds"]) && $_SESSION["icreds"] == true):
                $_SESSION["icreds"] = false ?>
                <p id="login-error" style="color: red;">incorrect Email or Password. Please Try Again</p>
            <?php endif; ?>

            <button class="login-btn" name="signin" type="submit">Login</button><br>
            <a href="forgot.php" style="color: white; font-weight: bold; text-decoration: none;">Forgot password?</a>
            <button class="create-text" type="button" onclick="register()">Create</button>
            <p style="color: white; font-weight: bold; text-decoration: none;">Dont have an account?</p>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>