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
$data = json_decode(file_get_contents('php://input'));
$item->id = $data->id;
$item->name = $data->name;
$item->email = $data->email;
$item->age = $data->age;
$item->designation = $data->designation;
$item->created_at = $data->created_at;

if ($item->updateAssociate()) {
    echo json_encode("Associado atualizado com sucesso :)");
} else {
    echo json_encode("OPS! Falha ao atualizar o associado :(");
}