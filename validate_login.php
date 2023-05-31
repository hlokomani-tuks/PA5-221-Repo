<?php
    // $passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";\

    $email = stripslashes(htmlspecialchars(trim($_POST['email'])));
    $password = stripslashes(htmlspecialchars(trim($_POST['password'])));

    // Connection to database
    $servername = "";
    $username = "";
    $db_password = "";
    $databasename = "";

    $connection = new mysqli($servername, $username, $db_password, $databasename);

    if(!$connection)
    {
        $response = [
            "response" => "server_issue",
        ];

        header("HTTP/1.1 500 Internal Server Error");
        header("Content-Type: application/json");
        echo json_encode($response);

        die("Connection failed: " . mysqli_connect_error($connection));
    }

    $result = $connection->query("SELECT email, password FROM User WHERE email = '$email'");

    if($result->num_rows == 0)
    {
        $response = [
            "response" => "not_registered"
        ];

        header("Content-Type: application/json");
        echo json_encode($response);
        
        die();
    }


    $verfied = password_verify($password, $result->fetch_row()[1]);
    
    if ($verfied) {
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
?>