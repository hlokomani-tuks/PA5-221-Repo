<?php
    require_once("header.php");
?>


<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/signup.css?">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
    </head>
    <body>

        <div class="cutout">
            <div class="login-form">
                <h1>Create An Account</h1>
                <p>Welcome, dear wine enthusiast!</p>
                <form id="signup-form" method="post" action="validate_signup.php">
                    <div class="form-group">
                       <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="name-error"></span>
                            <label class="required" for="">Name <span class="asterisk">*</span></label>
                            <input class="form-control required" type="text" id="name" onkeyup="validateName()" required>
                       </div>
                    </div>
                    <div class="form-group">
                       <div class="col-lg-7">
                            <label class="required" for="">Middle Initial</label>
                            <input class="form-control required" type="text" id="middle-initial" >
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="surname-error"></span>
                            <label class="required" for="">Surname <span class="asterisk">*</span></label>
                            <input class="form-control" type="text" id="surname" onkeyup="validateSurname()"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="email-error"></span>
                            <label class="required" for="">Email Address <span class="asterisk">*</span></label>
                            <input class="form-control" type="email" id="email" onkeyup="validateEmail()" required>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-lg-7">
                       <label class="required" for="">Cellphone Number</label>
                            <input class="form-control" type="" id="cellno">
                       </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="password-error"></span>
                            <label class="required" for="">Password <span class="asterisk">*</span></label>
                            <input class="form-control" type="password" id="password" onkeyup="validatePassword()" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="confirm-password-error"></span>
                            <label class="required" for="">Confirm Password <span class="asterisk">*</span></label>
                            <input class="form-control" type="confirm-password" id="confirm-password" onkeyup="confirmPassword()" required>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" name="user-type" id="critic">
                        <label class="form-check-label" for="check">Are you a critic?</label>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" name="user-type" id="manager">
                        <label class="form-check-label" for="check">Are you winery manager?</label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <button type="submit" class="btn1">Login</button>
                        </div>
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </form>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="js/signup.js"></script>
        <?php require_once("footer.php");?>
    </body>

</html>
