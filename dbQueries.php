<?php

  include_once "dbConn.php";

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

    $userSql = "INSERT INTO siteUser(fName, lName, password, email, bDay, Gender, nickname, hometown, about, martialStatus) VALUES(?,?,?,?,?,?,?,?,?,?)";

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
