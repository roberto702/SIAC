<?php

include_once 'db.php';

class User{

private $db;

private $db_table = "usuarios";

public function __construct(){
$this->db = new DbConnect();
}

public function isLoginExist($username, $password){

$query = "select * from " . $this->db_table . " where user = '$username' AND password = '$password' Limit 1";

$result = mysqli_query($this->db->getDb(), $query);

if(mysqli_num_rows($result) > 0){

mysqli_close($this->db->getDb());

return true;

}

mysqli_close($this->db->getDb());

return false;

}

public function createNewRegisterUser($username, $password){

$query = "insert into usuarios (user, password, nombre, apellidos, fecha_registro, estatus, tipo) values ('$username', '$password', '$nombre', $apellidos, NOW(), $status, $tipo)";

$inserted = mysqli_query($this->db->getDb(), $query);

if($inserted == 1){

$json['success'] = 1;

}else{

$json['success'] = 0;

}

mysqli_close($this->db->getDb());

return $json;

}

public function loginUsers($username, $password){

$json = array();

$canUserLogin = $this->isLoginExist($username, $password);

if($canUserLogin){

$json['success'] = 1;

}else{
$json['success'] = 0;
}
return $json;
}
}
?>