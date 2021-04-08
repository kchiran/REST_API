<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/messages.php';

    $database = new GetDatabase();
    $db = $database->retrieve_connection();

    $item = new Message($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->name = $data->name;
    $item->text = $data->text;
    $item->post_date = date('Y-m-d H:i:s');
    $item->likes = $data->likes;
    //$item->reply_to = $data->reply_to;
    
    if($item->createMessages()){
        echo 'Message created successfully.';
    } else{
        echo 'Message could not be created.';
    }
?>