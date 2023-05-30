<?php

session_start();

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $data = file_get_contents("php://input");
    $decoded = json_decode($data);

    if($data->action == 'get_wines'){
        $servername = "wheatley.cs.up.ac.za";
        $password = "CEHUZ7KY54OP2QLWN5CWGXUG3MLIDW56";
        $username = "u21488593";
        $databasename = "u21488593_PA5";
        
        $conn = mysqli_connect($servername, $username, $password, $databasename);
        
        if($conn->connect_error){
            die("Error connecting: " . $conn->connect_error);
        }

        $sql = "SELECT * from Wine";

        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            $wines = array();

            while($row = $result->fetch_assoc()){
                $name = $row[];
                $year = $row[];
                $description = $row[];
                $foodpair = $row[];
                $imageurl = $row[];

                $wine = array(
                    'name' => $name,
                    //
                    //
                    //
                );
                $wines[] = $wine;
            }

            $response = array(
                'status' => 'success',
                'timestamp' => time(),
                'data' => $wines
            );

            header('Content-Type: application/json');
            echo json_encode($wines, JSON_PRETTY_PRINT);
            die();

        }
        $conn->close();
    }
}