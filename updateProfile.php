<?php

  include_once "dbConn.php";
  include_once "validation.php";
  include_once "dbQueries.php";

  session_start();

  if(!isset($_SESSION["id"])){
    header("Location: index.php");
    exit();
  }

  $argument = array();
  $field = "";

  foreach($_POST as $key => $val){
    if(!empty($val)){
      if($key == "password"){
        $val = password_hash($val, PASSWORD_BCRYPT);
      }
      $field = $key . " = '" . $val . "'";
      $argument[] = $field;
    }
  }

  $updateElems = implode(",", $argument);
  $updated = 0;
  if(!empty($updateElems)){
    $db = openCon();

    $sql = "UPDATE siteUser SET " . $updateElems . " WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $_SESSION["id"]);
    $updated = $stmt->execute();
  }

  header("Location:profile.php?updated=".$updated);
  exit();

?>
