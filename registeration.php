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

  $errors = array();
  $data = array();
  $userData = [$fName, $lName, password_hash($password, PASSWORD_BCRYPT), $email, $birthday, $gender, $nickname, $hometown, $aboutMe, $mStatus];
  $userPhones = [$phoneA, $phoneB];

  /*
  Errors Order:
    - Missing data.
    - Invalid Email.
    - Email already in use.
    - Taken Nickname
  */

  if(empty($fName) || empty($lName) || empty($password) || empty($email) || empty($birthday)){
    $errors["message"] = "ERROR: Missing information, All information marked by * is required.";
    Err($data, $errors);
    return;
  }

  if(!validateEmail($email)){
    $errors["message"] = "Invalid email format.";
    Err($data, $errors);
    return;
  }

  if(!isUniqueEmail($email)){
    $errors["message"] = "Email already in use!";
    Err($data, $errors);
    return;
  }

  if(!empty($nickname) && !isUniqueNickname($nickname)){
    $errors["message"] = "Nickname already in use!";
    Err($data, $errors);
    return;
  }

  //Errors free-zone

  session_start();

  $id = insertNewUser($userData, $userPhones);

  $_SESSION["id"] = $id;

  $data["success"] = true;
  echo json_encode($data);
  return;

 ?>
