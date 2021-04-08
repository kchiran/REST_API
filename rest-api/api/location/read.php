<?php
    //this php code will return all the records from the database table
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/database.php';
    include_once '../../class/location.php';

    $database = new GetDatabase();
    $db = $database->retrieve_connection();

    $items = new Location($db);

    $stmt = $items->getLocations();
    $itemCount = $stmt->rowCount();


   // echo json_encode($itemCount);

    if($itemCount > 0){
        //let's declare an array before encoding in json
        //we will use HATEOAS approach to return the API
        $messageArr = array();
        $messageArr["body"] = array();
        $messageArr["itemCount"] = $itemCount;
        $messageArr["href"] = "https://google-search3.p.rapidapi.com/api/v1/search/q=Will+Shakespeare&num=100";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "city_name" => $city_name,
                "planet_name" => $planet_name,
                "spaceport_capacity" => $spaceport_capacity
            );

            array_push($messageArr["body"], $e);
        }
        echo json_encode($messageArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>