<?php

session_start();

$passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //clean up the data, preventing injection
        $name = stripslashes(htmlspecialchars(trim($_POST['name'])));
        $surname = stripslashes(htmlspecialchars(trim($_POST['surname'])));
        $email = stripslashes(htmlspecialchars(trim($_POST['email'])));
        $password = stripslashes(htmlspecialchars(trim($_POST['password'])));
        

        $salt = bin2hex(random_bytes(8));
        $h_password =password_hash($password.$salt, PASSWORD_DEFAULT);
        
        //check for empty fields
        if(empty($name) || empty($surname) || empty($email) || empty($password))
        {
            //echo an alert
            
            die();
        }

        //check password length
        if(strlen($password) < 8)
        {
            //echo an alert
            die();
        }

        //check for expression
        if(!preg_match($passEx, $password))
        {
            //echo an alert
            die();
        }

        //checks email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            //echo an alert
            die();
        }

        //connection to database
        $servername = "wheatley.cs.up.ac.za";
        $password = "";
        $username = "";
        $databasename = "";

        $connection = mysqli_connect($servername, $username, $password, $databasename);

        if(!$connection)
        {
            die("Connection failed: " . mysqli_connect_error($connection));
        }

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION["error"] = "You already have an account.";
            echo "<script>alert('You already have an account.');</script>";
            echo "<script>document.location='signup.php'</script>";
            //header("Location: signup.php");
            die();
        }

        //inserting new user into the database
        $sql2 = "INSERT INTO users () 
                    VALUES()";

        if(mysqli_query($connection, $sql2))
        {
            echo "<script>alert('Sign up successful! Write down your API Key BEFORE pressing ok, here it is: $api_k ');</script>";
            //echo "<script>document.location='signup.php'</script>";
            die();
        }else{
            $_SESSION["error"] = "$sqlquery".mysqli_error($connection);
            header("Location: signup.php");
            die();
        }
    }
    mysqli_close($connection);