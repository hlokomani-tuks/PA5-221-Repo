<?php include 'config.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Validate</title>
</head>
<body>
<?php
    function isValidEmail($email){
        $validEmailExp = '/^[A-Za-z0-9._%+-]{1,64}@(?:[A-Za-z0-9-]{1,63}\.){1,125}[A-Za-z]{2,63}/';
        return (preg_match($validEmailExp, $email) === 1);
    }
    
    function isValidPassword($password){
        $validPasswordExp = '/(?=(((\w)*([A-Z])+(\w)*(\W)+(\w)*([0-9])+)|((\w)*(\W)+(\w)*([0-9])(\w)*([A-Z])+)|((\w)*([0-9])+(\w)*([A-Z])+(\w)*(\W)+)|((\w)*([A-Z])+(\w)*([0-9])+(\w)*(\W)+)|((\w)*([0-9])+(\w)*(\W)+(\w)*([A-Z])+)|((\w)*(\W)+(\w)*([A-Z])+(\w)*([0-9])+)))(?=.{8,})/';
        return (preg_match($validPasswordExp, $password) === 1);
    }
    
    function isValidInput($input){
        $validInputExp = '/.{1,}/';
        return (preg_match($validInputExp, $input) === 1);
    }

    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $mname = $_POST["Middlename"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $f = isValidInput($fname);
    $l = isValidInput($lname);
    $m = isValidInput($mname);
    $em = isValidEmail($email);
    $p = isValidPassword($password);

    if($f && $l && $m && $em && $p){
        include 'header.php';
        signup($fname, $lname, $mname, $email, $password);
        include 'footer.php';
    }else{
        header("Location: signup.php");
        exit();
    }

    function signup($fname, $lname, $mname, $email, $password){
        global $conn;
        $s = $conn->insertUser($fname, $lname, $mname, $email, $password);
        if($s === true){
            if($conn->userLogin($email, $password)){
                signupComplete($mname);
                init_login();
            }else{
                die("Fatal Error.");
            }
        }else{
            signupFail($s);
        }
    }

    function signupComplete($mname){
        echo '<br><br><br><h1>Singup Complete.</h1>';
        echo 'Welcome ';
        echo $mname;
        echo '<script type="text/javascript">initNavbar("");</script>';
    }
    function signupFail($error){
        echo '<br><br><br><h1>Singup Failed:</h1>';
        echo $error;
        echo '<script type="text/javascript">initNavbar("");</script>';
    }

    function init_login(){
        echo '<script type="text/javascript">initNavbarLogin(' . '"'.$_SESSION["Email"].'"' . ',' . '"'.$_SESSION["UserName"].'"' . ',' . ''.$_SESSION["LogedIN"].'' . ');</script>';
    }
?>   
</body>
</html>