<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once '../../config/Database.php';
require_once '../../lib/Associate.php';

$database = new Database();
$db = $database->getConnection();

$items = new Associate($db);
$stmt = $items->getAssociates();
$itemCount = $stmt->rowCount();

echo json_encode($itemCount);

if ($itemCount > 0) {
    $associate = [];
    $associate['body'] = [];
    $associate['itemCount'] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $e = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'designation' => $designation,
            'created_at' => $created_at
        ];

        array_push($associate['body'], $e);
    }

    echo json_encode($associate);

} else {
    http_response_code(404);

    echo json_encode(["Message" => "Nenhum registro encontrado :("]);
}