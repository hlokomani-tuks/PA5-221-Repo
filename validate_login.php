<?php

    require_once("backend_config.php");
    
    session_start();
    // $passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";\

    $email = stripslashes(htmlspecialchars(trim($_POST['email'])));
    $password = stripslashes(htmlspecialchars(trim($_POST['password'])));

    $connection = Database::getConnection();

    $result = $connection->query("SELECT user_id, password, is_manager FROM User WHERE email = '$email'");

    if($result->num_rows == 0)
    {
        $response = [
            "response" => "not_registered"
        ];

        header("Content-Type: application/json");
        echo json_encode($response);


        $connection->close();
        die();
    }

    $row = $result->fetch_assoc();

    $verfied = password_verify($password, $row['password']);
    
    if ($verfied) {
        $_SESSION["logged_in"] = true;
        $_SESSION["user_id"] = (int) $row['user_id'];
        $_SESSION["is_manager"] = (bool) $row['is_manager'];

        $response = [
            "response" => "succesful"
        ];
        
        header("Content-Type: application/json");
        echo json_encode($response);
    } else {
        $response = [
            "response" => "failed"
        ];
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }

    $connection->close();
?>