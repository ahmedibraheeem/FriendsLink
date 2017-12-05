<?php

  include_once "dbConn.php";
  include_once "validation.php";
  include_once "dbQueries.php";

  //Required: fName, lName, password duh.., email, gender, Birthday

  $fName = $_POST["fName"];
  $lName = $_POST["lName"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $birthday = $_POST["birthday"];
  $gender = $_POST["gender"];

  $nickname = !empty($_POST["nickname"]) ? $_POST["nickname"] : NULL;
  $phoneA = !empty($_POST["phoneA"]) ? $_POST["phoneA"] : NULL;
  $phoneB = !empty($_POST["phoneB"]) ? $_POST["phoneB"] : NULL;
  $hometown = !empty($_POST["hometown"]) ? $_POST["hometown"] : NULL;
  $aboutMe = !empty($_POST["aboutMe"]) ? $_POST["aboutMe"] : NULL;
  $mStatus = !empty($_POST["mStatus"]) ? $_POST["mStatus"] : NULL;
  $profilePicture = NULL;

  $data = array();

  /*
  Errors Order:
    - Missing data.
    - Invalid Email.
    - Email already in use.
    - Taken Nickname
    - Check Supplied Image
  */

  if(empty($fName) || empty($lName) || empty($password) || empty($email) || empty($birthday)){
    Err($data, "ERROR: Missing information, All information marked by * is required.");
    return;
  }

  if(!validateEmail($email)){
    Err($data, "Invalid email format.");
    return;
  }

  if(!isUniqueEmail($email)){
    Err($data, "Email already in use!");
    return;
  }

  if(!empty($nickname) && !isUniqueNickname($nickname)){
    Err($data, "Nickname already in use!");
    return;
  }

  $result = validateImage($_FILES);
  if($result["valid"]){
    if(move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $result["target"])){
      $profilePicture = $result["target"];
    } else{
      Err($data,"Error uploading your file.");
      return;
    }
  } else{
    Err($data,$result["error"]);
    return;
  }

  //Errors free-zone

  session_start();

  $userData = [$fName, $lName, password_hash($password, PASSWORD_BCRYPT), $email, $birthday, $gender, $nickname, $hometown, $aboutMe, $mStatus, $profilePicture];
  $userPhones = [$phoneA, $phoneB];
  $id = insertNewUser($userData, $userPhones);
  $_SESSION["id"] = $id;
  $data["success"] = true;
  echo json_encode($data);
  return;

 ?>
