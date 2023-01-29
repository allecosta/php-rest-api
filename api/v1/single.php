<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once '../../config/Database.php';
require_once '../../lib/Associate.php';

$database = new Database();
$db = $database->getConnection();

$item = new Associate($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->getSingleAssociate();

if ($item->name != null) {
    $associate = [
        'id' => $item->id,
        'name' => $item->name,
        'email' => $item->email,
        'age' => $item->age,
        'designation' => $item->designation,
        'created_at' => $item->created_at
    ];

    http_response_code(200);

    echo json_encode($associate);

} else {
    http_response_code(404);

    echo json_encode("Associado não encontrado :(");
}