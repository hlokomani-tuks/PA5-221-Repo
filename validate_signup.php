<script src="js/signup.js"></script>

<?php

 session_start();

$passEx = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

$connection = mysqli_connect("wheatley.cs.up.ac.za", "u22506889", "SQZMUYWXTZSQURHKCBDKQQ6RDGAI6LYX", "u22506889_PA5");


$first_name = $_POST["first_name"];
$middle_initial = $_POST["middle_initial"];
$last_name = $_POST["last_name"];
$password = $_POST["password"];
$email = $_POST["email"];
$cellphone_number = $_POST["cellphone_number"];

$is_manager = isset($_POST['user-type']) ? $_POST['user-type'] : 0;


$sql = "SELECT email FROM User WHERE email = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $response = [
        "response" => "already_registered",
    ];

    header("Content-Type: application/json");
    echo json_encode($response);

    $stmt->close();
    $connection->close();
    die();
}

        // var_dump($first_name);
        // var_dump($middle_initial);
        // var_dump($last_name);
        // var_dump($password);
        // var_dump($email);
        // var_dump($cellphone_number);
        // var_dump($is_manager);

$h_password = password_hash($password, PASSWORD_DEFAULT);

$sql2 = "INSERT INTO User (first_name, middle_initial, last_name, password, email, cellphone_number, is_manager) 
          VALUES (?,?,?,?,?,?,?)";

$stmt2 = $connection->prepare($sql2);

if (!$stmt2->prepare($sql2))
{
    die("sql error");
}

if (!$stmt2) {
    die("sql error: " . $connection->error);
}

$stmt2->bind_param("sssssss", $first_name, $middle_initial, $last_name, $h_password, $email, $cellphone_number, $is_manager);
$stmt2->execute();
$stmt2->close();
$connection->close();

if($is_manager == 1)
{
    header("Location: manage.php");
    exit;
}
else
{
    header("Location: index.php");
    exit;
}

?>