<?php

    require_once("backend_config.php");

    session_start();

    $data = file_get_contents("php://input");
    $decoded = json_decode($data);

    $email = stripslashes(htmlspecialchars(trim($decoded->email)));
    $password = stripslashes(htmlspecialchars(trim($decoded->password)));

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
        $_SESSION["user_id"] = $row['user_id'];
        $_SESSION["is_manager"] = $row['is_manager'];

        $response = [
            "response" => "succesful"
        ];
        
        header("Content-Type: application/json");
        echo json_encode($response);
    } else {
        $response = [
            "response" => "wrong_password"
        ];
        
        header("Content-Type: application/json");
        echo json_encode($response);
    }

    $connection->close();
?>