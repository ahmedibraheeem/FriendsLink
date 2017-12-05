<?php

  include_once "dbQueries.php";

  function printUserData2($userData){
    $arrData = array("fName", "lName", "email", "Gender", "bDay", "hometown", "martialStatus", "about", "nickname");
    $div = "<div class=\"infoField\">";
    $divEnd = "</div>";

    for($i = 0; $i < sizeof($arrData) ; $i++){
      if($userData[$arrData[$i]] != NULL){
        echo $div;
        echo $arrData[$i] . ": ".$userData[$arrData[$i]];
        echo $divEnd;
      }
    }

  }

  function printUserData($userData){

    $arrData = array("fName", "lName", "email", "Gender", "bDay", "hometown", "martialStatus", "about", "nickname");

    $div = "<div class=\"infoField\">";
    $divEnd = "</div>";

    echo $div;
    if($userData["profilePicture"] != NULL) echo "<img class=\"profilePicture\" src=\"" . $userData["profilePicture"] . "\">";
    elseif ($userData["Gender"] == "Male") {
      echo "<img class=\"profilePicture\"  src=\"res/img/male.png\"";
    } else{
      echo "<img class=\"profilePicture\"  src=\"res/img/female.png\"";
    }
      echo $div;
      echo $div. $userData["fName"] . " " . $userData["lName"] .$divEnd;
      if($userData["nickname"] != NULL) echo "Nickname: " .  $userData["nickname"] . "<br>";
      echo $div."Email: " .  $userData["email"] .$divEnd;
      echo $div."Gender: " .  $userData["Gender"] . $divEnd;
      echo $div."Birthday: " .  $userData["bDay"] . $divEnd;
      if($userData["hometown"] != NULL) echo $div."Hometown: " .  $userData["hometown"] .$divEnd;
      if($userData["martialStatus"] != NULL) echo $div."Martial Status: " .  $userData["martialStatus"] .$divEnd;
      if($userData["about"] != NULL) echo $div."Bio: " .  $userData["about"] . $divEnd;

      $phones = getPhonesById($userData["ID"]);

      if($phones !== NULL || !empty($phones)){
        for($i = 0; $i < sizeof($phones) ; $i++){
          echo "Phone".(string)($i+1) .": 0".$phones[$i] ."<br>";
        }
      }

  }



 ?>
