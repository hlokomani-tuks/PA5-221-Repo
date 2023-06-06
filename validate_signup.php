<?php
    
    require_once("backend_config.php");

    session_start();

    $passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = file_get_contents("php://input");
        $decoded = json_decode($data);

        //clean up the data, preventing injection
        $first_name = stripslashes(htmlspecialchars(trim($decoded->first_name)));
        $middle_initial = stripslashes(htmlspecialchars(trim($decoded->middle_initial)));
        $last_name = stripslashes(htmlspecialchars(trim($decoded->last_name)));
        $email = stripslashes(htmlspecialchars(trim($decoded->email)));
        $password = stripslashes(htmlspecialchars(trim($decoded->password)));
        $cellphone = stripslashes(htmlspecialchars(trim($decoded->cellphone)));
        $is_manager = (int) stripslashes(htmlspecialchars(trim($decoded->is_manager)));
        
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

        $connection = Database::getConnection();

        $sql = "SELECT email FROM User WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            $response = [
                "response" => "already_registered",
            ];

            header("Content-Type: application/json");
            echo json_encode($response);

            $connection->close();
            die();
        }

        $h_password = password_hash($password, PASSWORD_DEFAULT);

        //inserting new user into the database
        $sql2 = "INSERT INTO User (first_name, middle_initial, last_name, password, email, cellphone_number, is_manager) 
             VALUES ('$first_name', '$middle_initial', '$last_name', '$h_password', '$email', '$cellphone', '$is_manager')";

        if(mysqli_query($connection, $sql2))
        {
            $_SESSION["logged_in"] = true;
            $_SESSION["user_id"] =  $connection->insert_id;
            $_SESSION["is_manager"] = $is_manager;
        
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