<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/database.php';
    include_once '../../class/spaceships.php';
    
    $database = new GetDatabase();
    $db = $database->retrieve_connection();
    
    $item = new Spaceships($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // spaceship values
    $item->name = $data->name;
    $item->model = $data->model;
    $item->location = $data->location;
    $item->status = $data->status;
    
    if($item->updateSpaceships()){
        echo json_encode("Spaceship data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>