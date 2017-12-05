<?php

  include_once "dbQueries.php";
  include_once "helperFunc.php";
  session_start();

  if(isset($_SESSION["id"])){
    $userData = getUserDataByID($_SESSION["id"]);
  } else{
    header("Location: index.php");
    exit();
  }

 ?>

<!DOCTYPE HTML>

<html>

<head>

  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="profile.css">

</head>

<body>

  <div class="infoWrapper">
  <?php
  printUserData2($userData);
   ?>
 </div>

<form method="get" action="logout.php">
  <input type="submit" value="LOG ME THE FUCK OUT">
</form>
<body>

</html>
