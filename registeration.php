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
  // $profilePic = NULL;
  //
  // $uploadsDir = "uploads/pp/";
  // $imgFileName = basename($_FILES["profilePicture"]["name"]);
  // $imgFileType = pathinfo($imgFileName, PATHINFO_EXTENSION);
  // $imgPath = $uploadsDir . uniqid("PP_") . "." . $imgFileType;
  //
  // $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
  // if($check !== false){
  //   if(move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $imgPath)){
  //     $profilePic = $imgPath;
  //   }
  // }

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

  //Errors free-zone

  session_start();

  $id = insertNewUser($userData, $userPhones);

  $_SESSION["id"] = $id;
  $data["success"] = true;
  echo json_encode($data);
  return;

 ?>
