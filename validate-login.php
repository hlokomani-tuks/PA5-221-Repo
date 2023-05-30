
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
        //echo $email;
        $validEmailExp = '/^[A-Za-z0-9._%+-]{1,64}@(?:[A-Za-z0-9-]{1,63}\.){1,125}[A-Za-z]{2,63}/';
        return (preg_match($validEmailExp, $email) === 1);
    }
    
    function isValidPassword($password){
        //echo $password;
        $validPasswordExp = '/(?=(((\w)*([A-Z])+(\w)*(\W)+(\w)*([0-9])+)|((\w)*(\W)+(\w)*([0-9])(\w)*([A-Z])+)|((\w)*([0-9])+(\w)*([A-Z])+(\w)*(\W)+)|((\w)*([A-Z])+(\w)*([0-9])+(\w)*(\W)+)|((\w)*([0-9])+(\w)*(\W)+(\w)*([A-Z])+)|((\w)*(\W)+(\w)*([A-Z])+(\w)*([0-9])+)))(?=.{8,})/';
        return (preg_match($validPasswordExp, $password) === 1);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $emb = isValidEmail($email);
    $pwb = isValidPassword($password);

    if($emb && $pwb){
        include 'header.php';
        //
        login($email, $password);
        include 'footer.php';
    } else {
        header("Location: login.php");
        exit();
    }

    function login($email, $password){
        global $conn;
        $lI = $conn->userLogin($email, $password);
        if($lI === true) {
            init_login();
            loginComplete();
        } else {
            loginFail($lI);
            $_SESSION['InvalidLogin'] = true;
        }
    }

    function loginComplete(){
        echo '<br><br><br><h1>Login Complete.</h1>';
        echo 'Welcome ';
        echo $_SESSION['UserName'];
        echo '<script type="text/javascript">initNavbar("");</script>';
        echo '<script type="text/javascript">setTimeout(() => { document.location = "index.php"; }, 2000)</script>';
    }
    function loginFail($error){
        echo '<br><br><br><h1>Login Failed:</h1>';
        echo $error;
        echo '<script type="text/javascript">initNavbar("");</script>';
    }

    function init_login(){
        echo '<script type="text/javascript">initNavbarLogin(' . '"'.$_SESSION["Email"].'"' . ',' . '"'.$_SESSION["UserName"].'"' . ',' . ''.$_SESSION["LogedIN"].'' . ');</script>';
    }
?>   
</body>
</html>