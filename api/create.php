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

$item->name = $_GET['name'];
$item->email = $_GET['email'];
$item->area = $_GET['area'];
$item->created_at = date('Y-m-d H:i:s');

if ($item->createEmployee()) {
    http_response_code(201);
    $msg = ["message" => "Employee created successfully."];
    echo json_encode($msg);
} else {
    http_response_code(200);
    $msg = ["message" => "Employee could not be created."];
    echo json_encode($msg);
}