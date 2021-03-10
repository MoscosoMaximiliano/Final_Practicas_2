<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=”robots” content=”noindex,nofollow”>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="css/styleLogin.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
            <!-- FORM SIGN IN -->
            <form action="db/signIn.php" class="sign-in-form" method="post">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="usernameIn">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="passwordIn">
                    </div>

                    <input type="submit" value="Sign In" class="btn solid" name="signInBTN">
                </form>

                <!-- FORM SIGN UP -->
                <form action="db/signUp.php" id="sign-up-form"class="sign-up-form" method="post">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="usernameUp">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Mail" name="mailUp">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="passwordUp">
                    </div>

                    <input type="submit" value="Sign Up" class="btn solid" name="signUpBTN">
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Register a new account for enjoy this service!</p>
                    <button class="btn transparent" id="sign-up-btn" name="">Sign up</button>
                </div>

                <img src="img/sign-up-logo.svg" alt="" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Want to sign in?</h3>
                    <p>Enter in your account to administrate all your subjects!</p>
                    <button class="btn transparent" id="sign-in-btn" name="">Sign in</button>
                </div>

                <img src="img/sign-in-logo.svg" alt="" class="image">
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/loginLogic.js"></script>
    
</body>
</html>

