<?php
    session_start();

    $passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //clean up the data, preventing injection
        $first_name = stripslashes(htmlspecialchars(trim($_POST['first_name'])));
        $middle_initial = stripslashes(htmlspecialchars(trim($_POST['middle_initial'])));
        $last_name = stripslashes(htmlspecialchars(trim($_POST['last_name'])));
        $email = stripslashes(htmlspecialchars(trim($_POST['email'])));
        $password = stripslashes(htmlspecialchars(trim($_POST['password'])));
        $cellphone = stripslashes(htmlspecialchars(trim($_POST['cellphone'])));
        
        //check for empty fields
        if (
            empty($first_name) || 
            empty($middle_initial) || 
            empty($last_name) ||
            empty($email) ||
            empty($password) ||
            empty($cellphone)
        ) 
        {
            $response = [
                "response" => "empty_field",
            ];
    
            header("Content-Type: application/json");
            echo json_encode($response);
            
            die();
        }

        //check password length
        if(strlen($password) < 8)
        {
            $response = [
                "response" => "short_password",
            ];
    
            header("Content-Type: application/json");
            echo json_encode($response);
            
            die();
        }

        //check for expression
        if(!preg_match($passEx, $password))
        {
            $response = [
                "response" => "invalid_password",
            ];
    
            header("Content-Type: application/json");
            echo json_encode($response);

            die();
        }

        //checks email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $response = [
                "response" => "invalid_email",
            ];
    
            header("Content-Type: application/json");
            echo json_encode($response);

            die();
        }

        //connection to database
        $servername = "wheatley.cs.up.ac.za";
        $password = "CEHUZ7KY54OP2QLWN5CWGXUG3MLIDW56";
        $username = "u21488593";
        $databasename = "u21488593_PA5";

        $connection = mysqli_connect($servername, $username, $db_password, $databasename);

        if(mysqli_connect_errno())
        {
            header("HTTP/1.1 500 Internal Server Error");
            header("Content-Type: application/json");

            die("Connection failed: " . mysqli_connect_error($connection));
        }

        $sql = "SELECT email FROM User WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $response = [
                "response" => "already_registered",
            ];

            header("Content-Type: application/json");
            echo json_encode($response);

            die();
        }

        $h_password = password_hash($password, PASSWORD_DEFAULT);

        //inserting new user into the database
        $sql2 = "INSERT INTO User (first_name, middle_initial, last_name, password, email, cellphone_number) 
             VALUES ('$first_name', '$middle_initial', '$last_name', '$h_password', '$email', '$cellphone')";

        if(mysqli_query($connection, $sql2))
        {
            $_SESSION["loggenIn"] = true;
            $_SESSION["email"] = $email;
        
            $response = [
                "response" => "succesful",
            ];

            header("Content-Type: application/json");
            echo json_encode($response);
        } else {
            $response = [
                "response" => "failed",
            ];

            header("Content-Type: application/json");
            echo json_encode($response);
        }
    }

    mysqli_close($connection);
?>