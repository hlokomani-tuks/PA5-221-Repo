
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <script defer src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script defer src="js/login.js"></script>

    <title>Login</title>
</head>
<body>
    <?php include 'header.php';?>
	<br><br><br>
	<div id="SubBody">
        <form onsubmit="" style="align-self: left;" id="login-form">
            <div class="DataObjectPageLeft row form">
                <h2>Login</h2>
            </div>
            <!-- <hr style="width: 570px; float: left;"> -->
            <div class="DataObjectPageLeft row">
                <div class="col">
                    Email: <br><br><input style="width: 465px;" class="input" type="email" name="email" id="email" onfocusout="validateEmail()">
                </div>
            </div>
            <br>
            <!-- <hr style="width: 570px; float: left;"> -->
            <div class="DataObjectPageLeft row">
                <div class="col">
                    Password: <br><br><input style="width: 465px;" class="input" type="password" name="password" id="password" onfocusout="validatePassword()">
                </div>
	    </div>

            <br>
            <!-- <hr style="width: 570px; float: left;"> -->
            <div class="DataObjectPageLeft row">
                <div class="col">
                    <button type="submit" id="submit">Submit</button>
                </div>
                <br>
                <div class="col">
                    <p style="color: red" id="error"></p>
                </div>
            </div>

            <!-- <hr style="width: 570px; float: left;"> -->
            <div class="DataObjectPageLeft row">
                <div class="col">
                    <br>
                    <!-- <p style="margin-top: 2px; margin-bottom: 2px;"><a style="color: var(--highlight-color)" href="signup.php">Don't have an account, SignUp</a></p> -->
                    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
                </div>
            </div>
        </form>
	</div>
    <?php include 'footer.php';?>
</body>
</html>
