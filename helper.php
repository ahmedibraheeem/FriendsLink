<?php

  include_once "dbConn.php";

  function confirmFR($targetID, $userID, $type){
    $db = openCon();

    $sql = "UPDATE friendrequest SET status = :s WHERE requesterID = :rid AND friendID = :fid";
    $stt = ($type == "accept") ? 1 : 2;
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":s", $stt);
    $stmt->bindParam(":rid", $targetID);
    $stmt->bindParam(":fid", $userID);
    $scs = $stmt->execute();

    if($type == "decline"){
      return $scs;
    }

    $sql = "INSERT INTO friends(userID, friendID) VALUES (:a,:b), (:b,:a)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":a", $userID);
    $stmt->bindParam(":b", $targetID);
    $scs = $stmt->execute();

    $db = NULL;
    return $scs;
  }

 ?>
