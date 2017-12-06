<?php

  include_once "dbQueries.php";
  include_once "helperFunc.php";
  session_start();

  if (!isset($_SESSION["id"])) {
      header("Location: index.php");
      exit();
  }


  $requiredID = $_SESSION["id"];
  $personal = true;
  $status = -1;

  if (isset($_GET["id"]) && $_GET["id"] != $_SESSION["id"]) {
      $requiredID = $_GET["id"];
      $personal = false;
      $rs = getFriendStatus($_SESSION["id"], $_GET["id"]);
      $status = (sizeof($rs) == 1) ? $rs[0]["status"] : -1;
  }

  $userData = getUserDataByID($requiredID);

  $updateStatus = "";
  $color = "GREEN";

  if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["updated"])) {
      $status = $_GET["updated"];

      if ($status == "1") {
          $updateStatus = "Updated information successfully!";
      } else {
          $color = "RED";
          $updateStatus = "Updating information failed.";
      }
  }

 ?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Profile</title>
        <script src="JS/jquery.min.js"></script>
        <script src="JS/profile.js"></script>
        <link rel="stylesheet" type="text/css" href="res/css/profile.css">
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
        <a href="profile.php">Profile</a>
        -
        <a href="people.php">People</a>
        -
        <a href="friendRequests.php">Friend Requests</a>
      </div>
        <div class="infoWrapper">
            <div class="imgWrapper">
            <img class="profilePicture" src="<?php echo $userData["profilePicture"] ?>">
          </div>
            <div class="infoField" id="updateNotify">
              <label id="updateStatus" <?php echo "style=\"color:" . $color ."\"";?>><?php echo $updateStatus; ?></label>
            </div>
            <div class="infoField" id="name">
                <?php echo ucfirst($userData["fName"]) . " " . ucfirst($userData["lName"])?>
                <?php if ($userData["nickname"] != null) {
     echo "(".$userData["nickname"].")";
 } ?>
            </div>
            <hr noshade>
            <?php if ($userData["about"] != null):?>
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
            <?php if ($userData["hometown"] != null):?>
            <div class="infoField" id="hometown">
                <label>Hometown: </label><?php echo $userData["hometown"]; ?>
            </div>
            <?php endif; ?>
            <?php if ($userData["martialStatus"] != null):?>
            <div class="infoField" id="martialStatus">
                <label>Martial Status: </label><?php echo $userData["martialStatus"]; ?>
            </div>
            <?php endif; ?>
            <?php $phones = getPhonesById($userData["ID"]);
                $div = "<div class=\"infoField\"";
                $divEnd = "</div>";
                if ($phones !== null || !empty($phones)) {
                    for ($i = 0; $i < sizeof($phones) ; $i++) {
                        echo $div. "id=\""."phone".(string)($i+1)."\">"."<label>Phone: </label>"."0".$phones[$i].$divEnd;
                    }
                }

                ?>
            <hr noshade>
        </div>

        <div class="footerButtons">
          <?php if ($personal): ?>
          <button id="editBtn">Edit Profile</button>
        <?php elseif ($status == 0): ?>
          <button id="requestSent" class="disabled">Request Sent</button>
        <?php else: ?>
          <form id="addfriend" style="display:inline-block;" method="POST" action="addFriend.php">
            <input type="hidden" id="requesterID" value="<?php echo $_SESSION["id"]?>">
            <input type="hidden" id="friendID" value="<?php echo $_GET["id"]?>">
          <input type="submit" id="addFriendBtn" value="Add Friend"></button>
        </form>
        <?php endif; ?>
          <button id="logoutBtn">Log out</button>
        </div>

        <body>
</html>
