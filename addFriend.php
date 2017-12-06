<?php

  include_once "dbQueries.php";

  session_start();

  if(!isset($_SESSION["id"])){
    header("Location: index.php");
    exit();
  }

  $reqID = intval($_POST["requesterID"]);
  $frid = intval($_POST["friendID"]);
  $data = array();
  $stt = sendFriendRequest($reqID, $frid);

  $data["success"] = $stt;

  echo json_encode($data);

 ?>
