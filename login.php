<?php

session_start();

$passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //clean up the data, preventing injection
        
        $email = stripslashes(htmlspecialchars(trim($_POST['email'])));
        $password = stripslashes(htmlspecialchars(trim($_POST['password'])));
        

        $salt = bin2hex(random_bytes(8));
        $h_password =password_hash($password.$salt, PASSWORD_DEFAULT);
        
        //check for empty fields
        if(empty($email) || empty($password))
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

        if(mysqli_num_rows($result) == 0)
        {
            $_SESSION["error"] = "You do not have an account.";
            echo "<script>alert('You do not have an account.');</script>";
            //echo "<script>document.location='signup.php'</script>";
            //header("Location: signup.php");
            die();
        }

        //do the checking for the password
        //check if it matches the password in the db
        //if it does, let them know they are logged in


    }