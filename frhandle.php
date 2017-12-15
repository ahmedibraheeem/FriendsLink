<?php

  session_start();

  if(!isset($_SESSION["id"])){
    header("Location: index.php");
    exit();
  }

  include_once "helper.php";

  $type = $_POST["type"];
  $targetID = $_POST["targetID"];
  $userID = $_POST["userID"];

  $confirm = confirmFR($targetID, $userID, $type);

  $data = array();
  $data["success"] = $confirm;

  echo json_encode($data);
 ?>
