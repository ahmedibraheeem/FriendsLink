<?php

include_once "dbQueries.php";
include_once "validation.php";

$email = $_POST["email"];
$password = $_POST["password"];

$data = array();

$userData = getUserDataByEmail($email);

if($userData == NULL){
  Err($data, "Invalid Email.");
  return;
} else{
  $correctPassword = password_verify($password, $userData["password"]);
  if($correctPassword){
    session_start();
    $_SESSION["id"] = $userData["id"];
    $data["success"] = true;
    echo json_encode($data);
    return;
  } else{
    Err($data, "Invalid Password.");
    return;
  }
}

 ?>
