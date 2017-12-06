<?php

  include_once "dbQueries.php";
  include_once "helperFunc.php";
  session_start();

  if (isset($_SESSION["id"])) {
      $userData = getUserDataByID($_SESSION["id"]);
  } else {
      header("Location: index.php");
      exit();
  }

 ?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Profile</title>
        <script src="JS/jquery.min.js"></script>
        <script src="JS/profile.js"></script>
        <link rel="stylesheet" type="text/css" href="profile.css">
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    </head>
    <body>
      <div class="header">
        <a href="index.php">
        <img src="res/img/friendsLink.png" id="logo">
      </a>
      </div>
      <div class="toolbar">
        HI..Bye
      </div>
        <div class="infoWrapper">
            <img class="profilePicture" src="<?php echo $userData["profilePicture"] ?>">
            <div class="infoField" id="name">
                <?php echo ucfirst($userData["fName"]) . " " . ucfirst($userData["lName"])?>
                <?php if($userData["nickname"] != NULL){
                    echo "(".$userData["nickname"].")";
                    } ?>
            </div>
            <hr noshade>
            <?php if($userData["about"] != NULL):?>
            <div class="infoField" id="aboutMe">
                <?php echo $userData["about"]; ?>
            </div>
            <?php endif; ?>
            <div class="infoField" id="email">
                <?php echo $userData["email"] ?>
            </div>
            <div class="infoField" id="gender">
                <?php echo $userData["Gender"] ?>
            </div>
            <div class="infoField" id="birthday">
                <label>Birthday: </label><?php echo $userData["bDay"] ?>
            </div>
            <?php if($userData["hometown"] != NULL):?>
            <div class="infoField" id="hometown">
                <label>Hometown: </label><?php echo $userData["hometown"]; ?>
            </div>
            <?php endif; ?>
            <?php if($userData["martialStatus"] != NULL):?>
            <div class="infoField" id="martialStatus">
                <label>Martial Status: </label><?php echo $userData["martialStatus"]; ?>
            </div>
            <?php endif; ?>
            <?php $phones = getPhonesById($userData["ID"]);
                $div = "<div class=\"infoField\"";
                $divEnd = "</div>";
                if($phones !== NULL || !empty($phones)){
                  for($i = 0; $i < sizeof($phones) ; $i++){
                    echo $div. "id=\""."phone".(string)($i+1)."\">"."<label>Phone: </label>"."0".$phones[$i].$divEnd;
                  }
                }

                ?>
            <hr noshade>
        </div>

        <div class="footerButtons">
          <button id="editBtn">Edit Profile</button>
          <button id="logoutBtn">Log out</button>
        </div>

        <body>
</html>
