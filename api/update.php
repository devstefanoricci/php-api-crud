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
$item->name = $_POST['name'];
$item->email = $_POST['email'];
$item->area = $_POST['area']; */
$item->created_at = date('Y-m-d H:i:s');
if ($item->updateEmployee()) {
    echo json_encode("Employee data updated.");
} else {
    echo json_encode("Data could not be updated");
}