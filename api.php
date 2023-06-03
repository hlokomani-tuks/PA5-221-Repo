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

        if ($decoded->wine_id == null)
            $decoded->wine_id = "%";

        if ($decoded->sort_by == null)
            $decoded->sort_by = "wine_id";

        if ($decoded->sort_in == null)
            $decoded->sort_in = "ASC";

        $sql =
            "SELECT
                wine_id,
                Wine.name,
                year,
                description,
                food_pairing,
                image_url,
                user_rating,
                user_rating_count,
                critic_rating,
                critic_rating_count,
                grape_varieties,
                colour, 
                body,
                sweetness,
                tannin,
                country,
                province, 
                farm,
                estate,
                Winery.name AS winery_name,
                email AS winery_email,
                cellphone_number AS winery_cellphone
            FROM WineWithReview Wine
            JOIN WineType
            ON Wine.type_id = WineType.type_id
            JOIN Winery
            ON Wine.winery_id = Winery.winery_id
            WHERE wine_id LIKE '$decoded->wine_id'
            ORDER BY $decoded->sort_by $decoded->sort_in";

        $result = mysqli_query($conn, $sql);

        $wines = array();

        while ($row = $result->fetch_assoc()) {
            $wines[] = [
                "wine_id" => $row["wine_id"],
                "name" => $row["name"],
                "year" => $row["year"],
                "description" => $row["description"],
                "food_pairing" => $row["food_pairing"],
                "image_url" => $row["image_url"],
                "user_rating" => $row["user_rating"],
                "user_rating_count" => $row["user_rating_count"],
                "critic_rating" => $row["critic_rating"],
                "critic_rating_count" => $row["critic_rating_count"],
                "grape_varieties" => $row["grape_varieties"],
                "colour" => $row["colour"],
                "body" => $row["body"],
                "sweetness" => $row["sweetness"],
                "tannin" => $row["tannin"],
                "country" => $row["country"],
                "province" => $row["province"],
                "farm" => $row["farm"],
                "estate" => $row["estate"],
                "winery_name" => $row["winery_name"],
                "winery_email" => $row["winery_email"],
                "winery_cellphone" => $row["winery_cellphone"]
            ];
        }

        $response = [];

        if ($decoded->wine_id == "%") {
            $response = array(
                'status' => 'success',
                'timestamp' => time(),
                'data' => $wines
            );
        } else if (count($wines) == 1) {
            $response = array(
                'status' => 'success',
                'timestamp' => time(),
                'data' => $wines[0]
            );
        } else {
            $response = array(
                'status' => 'error',
                'timestamp' => time(),
                'error' => "No wine with given ID found"
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);

        $conn->close();
    } else if ($decoded->type == 'get_reviews') {
        $wine_id = $decoded->wine_id;
        $result = $conn->query(
            "SELECT 
                first_name, 
                middle_initial,
                last_name,
                rating,
                comment,
                is_critic 
            FROM Review 
            JOIN User 
            ON Review.user_id = User.user_id 
            WHERE wine_id = '$wine_id'"
        );

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

        $conn->close();
    } else {
        $response = array(
            'status' => 'error',
            'timestamp' => time(),
            'error' => 'That endpoint does not exist.'
        );

        echo json_encode($response, JSON_PRETTY_PRINT);

        $conn->close();
    }
}
