<?php
    require_once("header.php");
?>
 

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
        <script defer src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script defer src="js/signup.js"></script>
    </head>
    <body>
        <div class="cutout">
            <div class="login-form">
                
                <form id="signup-form">
                <h1>Create An Account</h1>
                <p>Welcome, dear wine enthusiast!</p>
                    <div class="form-group">
                       <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="name-error"></span>

                            <label class="required" for="name">Name <span class="asterisk">*</span></label>
                            <input class="form-control required" type="text" id="name" name="first_name" onkeyup="validateName()"  required>

                       </div>
                    </div>
                    <div class="form-group">
                       <div class="col-lg-7">

                            <label class="required" for="middle-initial">Middle Initial</label>
                            <input class="form-control required" type="text" id="middle-initial" name="middle_initial" >

                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="surname-error"></span>

                            <label class="required" for="surname">Surname <span class="asterisk">*</span></label>
                            <input class="form-control" type="text" id="surname"  name="last_name" onkeyup="validateSurname()" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="email-error"></span>
                            <label class="required" for="email">Email Address <span class="asterisk">*</span></label>
                            <input class="form-control" type="email" id="email"  name="email" onkeyup="validateEmail()" required>
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-lg-7">

                       <span class="error" id="cellno-error"></span>
                       <label class="required" for="">Cellphone Number</label>
                            <input class="form-control" type="cellphone_number" name="cellphone_number" id="cellno" onkeyup="validateCellNo()">

                       </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>

                            <span class="error" id="password-error"></span>
                            <label class="required" for="password">Password <span class="asterisk">*</span></label>
                            <input class="form-control" type="password" name="password" id="password" onkeyup="validatePassword()"  required>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <span></span>
                            <span class="error" id="confirm-password-error"></span> <br>

                            <label class="required" for="">Confirm Password <span class="asterisk">*</span></label>
                            <input class="form-control" type="confirm_password" id="confirm-password"  onkeyup="confirmPassword()" required>

                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" name="user-type" id="viewer" value="1" checked>
                        <label class="form-check-label" for="viewer">Are you a viewer?</label>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" name="user-type" id="critic" value="1">
                        <label class="form-check-label" for="ctitic" name="is_critic">Are you a crtitic?</label>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" name="user-type" id="manager" value="1">
                        <label class="form-check-label" for="manager" name="is_manager">Are you winery manager?</label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-7">
                            <button type="submit" class="btn1">Sign Up</button>
                        </div>
                    </div>
                    <span class="error" id="error-span"></span>
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </form>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
       
        <?php require_once("footer.php");?>
    </body>

</html>
