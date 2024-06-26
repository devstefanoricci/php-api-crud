<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../classes/employees.php';

$database = new Database();
$db = $database->getConnection();
$item = new Employee($db);

$item->id = isset($_POST['id']) ? $_POST['id'] : die();

if ($item->deleteEmployee()) {
    http_response_code(200);
    $msg = ["message" => "Employee deleted."];
    echo json_encode($msg);
} else {
    http_response_code(204);
    $msg = ["message" => "Data could not be deleted"];
    echo json_encode($msg);
}
