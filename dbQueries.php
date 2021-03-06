<?php

  include_once "dbConn.php";

  function advSearch($email, $f, $l, $ht, $lim, $off){
    $db = openCon();
    $ht = "%" . $ht . "%";
    $f = "%". $f . "%";
    $l = "%" .$l."%";

    $sql = "SELECT ID, nickname, CONCAT(fName, ' ',lName) AS name, profilePicture FROM siteUser WHERE email = :email OR fName LIKE :f OR lName LIKE :l OR hometown LIKE :ht LIMIT :lim OFFSET :off";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":f", $f);
    $stmt->bindParam(":l", $l);
    $stmt->bindParam(":ht", $ht);
    $stmt->bindParam(":lim", $lim, PDO::PARAM_INT);
    $stmt->bindParam(":off", $off, PDO::PARAM_INT);

    $stmt->execute();

    $db = null;
    $result = array();
    $result["data"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result["count"] = $stmt->rowCount();
    return $result;
  }

  function numberOfFriendRequests($id){
    $db = openCon();
    $sql = "SELECT count(requesterID) FROM friendrequest where friendID = :id AND status = 0";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function getFriendRequests($id){
    $db = openCon();

    $sql = "SELECT ID, nickname, concat(fName, \" \", lName) as name, profilePicture  from siteuser WHERE ID in (SELECT requesterID FROM friendrequest where friendID = :id AND status = 0)";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $db = NULL;

    $result = array();
    $result["friends"] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result["num"] = $stmt->rowCount();

    return $result;

  }

  function getFriendStatus($reqID, $targetID){
    $db = openCon();

    $sql = "SELECT status FROM friendrequest WHERE (requesterID = :reqid AND friendID = :frid) OR (requesterID = :frid AND friendID = :reqid)" ;
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":reqid", $reqID);
    $stmt->bindParam("frid", $targetID);
    $stmt->execute();
    $db = NULL;
    $resultset = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultset;
  }

  function sendFriendRequest($reqID, $friendID){
    $db = openCon();

    $zero = 0;
    $sql = "INSERT INTO friendrequest(requesterID, friendID, status) VALUES(:reqid,:frid, :stt)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":reqid", $reqID, PDO::PARAM_INT);
    $stmt->bindParam(":frid", $friendID, PDO::PARAM_INT);
    $stmt->bindParam(":stt", $zero, PDO::PARAM_INT);
    $requestStt = $stmt->execute();
    $db = NULL;
    return $requestStt;
  }

  function getLimitedRows($limit, $offset, $id){

    $db = openCon();
    $sql = "SELECT ID, nickname, CONCAT(fName, ' ',lName) AS name, profilePicture FROM siteUser WHERE ID <> :id LIMIT :lim OFFSET :off";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":lim", $limit, PDO::PARAM_INT);
    $stmt->bindParam(":off", $offset, PDO::PARAM_INT);
    $stmt->execute();
    $db = NULL;

    if($stmt->rowCount() > 0){
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return NULL;
  }

  function rowsCount(){
    $db = openCon();

    $sql = "SELECT COUNT(*) FROM siteUser";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);

    return $arr;
  }

  function getUsersExcept($id){
    $db = openCon();

    $sql = "SELECT ID, nickname, CONCAT(fName, ' ',lName) AS name, profilePicture FROM siteUser WHERE ID <> :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $db = NULL;

    if($stmt->rowCount() > 0){
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    return NULL;

  }

  function getPhonesById($id){
    $db = openCon();

    $sql = "SELECT phoneNumber FROM phonebook WHERE userID = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $db = NULL;

    if($stmt->rowCount() > 0){
      return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
    }

    return NULL;

  }

  function getUserDataByID($id){
    $db = openCon();

    $sql = "SELECT * FROM siteUser WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $db = NULL;

    if($stmt->rowCount() == 0){
      return NULL;
    }

    return $stmt->fetch(PDO::FETCH_ASSOC);

  }

  function getUserDataByEmail($email){
    $db = openCon();

    $sql = "SELECT * FROM siteUser WHERE EMAIL = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $db = NULL;

    if($stmt->rowCount() == 0){
      return NULL;
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  }

  function isUniqueEmail($email){
    $db = openCon();
    $stmt = $db->prepare("SELECT EMAIL FROM siteUser WHERE email = :e");

    $stmt->bindParam(":e", $email);
    $stmt->execute();

    $db = NULL;

    return $stmt->rowCount() == 0;
  }

  function isUniqueNickname($nickname){
    $db = openCon();
    $stmt = $db->prepare("SELECT nickname FROM siteUser WHERE nickname = :nick");

    $stmt->bindParam(":nick", $nickname);
    $stmt->execute();

    $db = NULL;

    return $stmt->rowCount() == 0;
  }

  function insertNewUser($userData, $userPhones){
    $db = openCon();

    $userSql = "INSERT INTO siteUser(fName, lName, password, email, bDay, Gender, nickname, hometown, about, martialStatus, profilePicture) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

    $phoneSql = "INSERT INTO phoneBook(userID,phoneNumber) VALUES (:id, :num)";

    $stmt = $db->prepare($userSql);
    $inserted = $stmt->execute($userData);


    if($inserted){
      $id = $db->lastInsertId();

      for($i = 0 ; $i < sizeof($userPhones) ; $i++){
        $stmt = $db->prepare($phoneSql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":num", $userPhones[$i]);
        $stmt->execute();
      }

      return $id;
    }

    $db = NULL;

  }

 ?>
