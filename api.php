<?php

session_start();

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = file_get_contents("php://input");
    $decoded = json_decode($data);

    $servername = "wheatley.cs.up.ac.za";
    $password = "CEHUZ7KY54OP2QLWN5CWGXUG3MLIDW56";
    $username = "u21488593";
    $databasename = "u21488593_PA5";

    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if ($conn->connect_error) {
        header("HTTP/1.1 500 Internal Server Error");
        die("Error connecting: " . $conn->connect_error);
    }

    if ($decoded->type == 'get_wines') {

        $sql = "SELECT Wine.*, WineType.grape_varieties, WineType.colour, WineType.body, WineType.sweetness, WineType.tannin, Winery.winery_id, Winery.name AS winery_name, Winery.country, Winery.province, Winery.farm, Winery.estate, Winery.rating, Winery.email, Winery.cellphone_number FROM Wine JOIN WineType ON Wine.type_id = WineType.type_id JOIN Winery ON Wine.winery_id = Winery.winery_id";

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $wines = array();

            while ($row = $result->fetch_assoc()) {
                $wine_id = $row['wine_id'];
                $name = $row['name'];
                $year = $row['year'];
                $description = $row['description'];
                $foodpair = $row['food_pairing'];
                $imageurl = $row['image_url'];
                $grape_varieties = $row['grape_varieties'];
                $colour = $row['colour'];
                $body = $row['body'];
                $sweetness = $row['sweetness'];
                $tannin = $row['tannin'];
                $winery_name = $row['winery_name'];
                $country = $row['country'];
                $province = $row['province'];
                $farm = $row['farm'];


                $wine = array(
                    'wine_id' => $wine_id,
                    'name' => $name,
                    'year' => $year,
                    'description' => $description,
                    'foodpair' => $foodpair,
                    'image' => $imageurl,
                    'grape variety' => $grape_varieties,
                    'colour' => $colour,
                    'body' => $body,
                    'sweetness' => $sweetness,
                    'tannin' => $tannin,
                    'winery_name' => $winery_name,
                    'country' => $country,
                    'province' => $province,
                    'farm' => $farm
                );
                $wines[] = $wine;
            }

            $response = array(
                'status' => 'success',
                'timestamp' => time(),
                'data' => $wines
            );

            header('Content-Type: application/json');
            echo json_encode($response, JSON_PRETTY_PRINT);
            die();
        }
        $conn->close();
    } else if ($decoded->type == 'get_reviews') {
        $wine_id = $decoded->wine_id;
        $result = $conn->query("
            SELECT 
                first_name, 
                middle_initial,
                last_name,
                rating,
                comment,
                is_critic 
            FROM Review 
            JOIN User 
            ON Review.user_id = User.user_id 
            WHERE wine_id = '$wine_id'
        ");

        $reviews = [];

        while ($row = $result->fetch_assoc()) {
            $reviews[] = [
                "first_name" => $row["first_name"],
                "middle_initial" => $row["middle_initial"],
                "last_name" => $row["last_name"],
                "rating" => $row["rating"],
                "comment" => $row["comment"],
                "is_critic" => (bool) $row["is_critic"]
            ];
        }

        $response = [
            "status" => "success",
            "timestamp" => time(),
            "data" => $reviews
        ];

        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'timestamp' => time(),
            'Error: ' => 'That endpoint does not exist.'
        );
        echo json_encode($response, JSON_PRETTY_PRINT);
        die();
    }
}
?>