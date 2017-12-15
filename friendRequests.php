<?php

  session_start();

  include_once "dbQueries.php";

  if(!isset($_SESSION["id"])){
    header("Location: index.php");
    exit();
  }

  $friends = getFriendRequests($_SESSION["id"]);
  $accounts = $friends["friends"];
  $friendsNO = $friends["num"];

 ?>

<!DOCTYPE HTML>
<html>
   <head>
      <title>Profile</title>
      <script src="JS/jquery.min.js"></script>
      <script src="JS/requestHandle.js"></script>
      <link rel="stylesheet" type="text/css" href="res/css/friendRequests.css">
      <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
   </head>
   <body>
     <input type="hidden" id="hdnId" value="<?php echo $_SESSION["id"]; ?>"/>
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
         <a href="friendRequests.php">Friend Requests (<?php echo numberOfFriendRequests($_SESSION["id"])["count(requesterID)"]; ?>)</a>
      </div>

      <div class="requests">

        <?php
        if($friendsNO > 0){

          $div1 = "<div class=\"requestWrapper\">";
          $div2 = "<div class=\"container\">";
          $div3 = "<div class=\"requestButtons\">";
          $divE = "</div>";

          for($i=0;$i<$friendsNO;$i++){
            $temp = $accounts[$i];
            $img = $temp["profilePicture"];
            $name = $temp["nickname"] ? $temp["nickname"] : $temp["name"];
            $id = $temp["ID"];
            echo $div1;
            echo $div2;
            echo "<h2>Friend Request</h2>";
            echo "<img src=\"" . $img . "\" width=\"100px\" height=\"100px\">";
            echo "<h3>" . $name . "</h3>";
            echo $div3;
            echo "<button id=\"". $id ."\" class=\"accept\">Accept</button>";
            echo "<button id=\"". $id ."\" class=\"decline\">Decline</button>";
            echo $divE;
            echo $divE;
            echo $divE;
          }
        }
        else{
          echo "<p class=\"lonely\">No friend requests.</p>";
        }
         ?>

         <!-- <div class="requestWrapper">
            <div class="container">
               <h2>Friend Request</h2>
               <img src="res/img/male.png" width="100px" height="100px">
               <h3> John Maged </h3>
               <div class="requestButtons">
                  <button class="accept">Accept</button>
                  <button class="decline">Decline</button>
               </div>
            </div>
         </div> -->
      </div>

   </body>
</html>
