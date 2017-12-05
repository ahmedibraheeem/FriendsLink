<?php

  include "dbQueries.php";

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

<body>
  <?php

    echo "Name: " . $userData["fName"] . " " . $userData["lName"] . "<br>";
    if($userData["nickname"] != NULL) echo "Nickname: " .  $userData["nickname"] . "<br>";
    echo "Email: " .  $userData["email"] . "<br>";
    echo "Gender: " .  $userData["Gender"] . "<br>";
    echo "Birthday: " .  $userData["bDay"] . "<br>";
    if($userData["hometown"] != NULL) echo "Hometown: " .  $userData["hometown"] . "<br>";
    if($userData["martialStatus"] != NULL) echo "Martial Status: " .  $userData["martialStatus"] . "<br>";
    if($userData["about"] != NULL) echo "Bio: " .  $userData["about"] . "<br>";
    if($userData["profilePicture"] != NULL) {echo "<br><br><br>";
    echo "<img height=\"150\" src=\"" . $userData["profilePicture"] . "\">";
    }



   ?>

<form method="get" action="logout.php">
  <input type="submit" value="LOG ME THE FUCK OUT">
</form>
<body>

</html>
