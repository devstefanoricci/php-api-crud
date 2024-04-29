<?php
class Employee{
// dbection
private $db;
// Table
private $db_table = "employees";
// Columns
public int $id;
public string $name;
public string $email;
public string $area;
public string $created_at;
public int $result;


// Db dbection
public function __construct($db){
$this->db = $db;
}

// GET ALL
public function getEmployees(){
$sqlQuery = "SELECT id, name, email, area, created_at FROM " . $this->db_table . "";
$this->result = $this->db->query($sqlQuery);
return $this->result;
}

// CREATE
public function createEmployee(){
// sanitize
$this->name=htmlspecialchars(strip_tags($this->name));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->area=htmlspecialchars(strip_tags($this->area));
$this->created_at=htmlspecialchars(strip_tags($this->created_at));
$sqlQuery = "INSERT INTO
". $this->db_table ." SET name = '".$this->name."',
email = '".$this->email."',
area = '".$this->area."',created_at = '".$this->created_at."'";
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// UPDATE
public function getSingleEmployee(){
$sqlQuery = "SELECT id, name, email, area, created_at FROM
". $this->db_table ." WHERE id = ".$this->id;
$record = $this->db->query($sqlQuery);
$dataRow=$record->fetch_assoc();
$this->name = $dataRow['name'];
$this->email = $dataRow['email'];
$this->area = $dataRow['area'];
$this->created_at = $dataRow['created_at'];
}

// UPDATE
public function updateEmployee(){
$this->name=htmlspecialchars(strip_tags($this->name));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->area=htmlspecialchars(strip_tags($this->area));
$this->created_at=htmlspecialchars(strip_tags($this->created_at));
$this->id=($this->id);

$sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
email = '".$this->email."',
area = '".$this->area."',created_at = '".$this->created_at."'
WHERE id = ".$this->id;

$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}

// DELETE
function deleteEmployee(){
$sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
$this->db->query($sqlQuery);
if($this->db->affected_rows > 0){
return true;
}
return false;
}
}
?>