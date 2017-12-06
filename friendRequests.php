<?php

  session_start();

  if(!isset($_SESSION["id"])){
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
         <link rel="stylesheet" type="text/css" href="res/css/friendRequests.css">
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

       <div class="requestWrapper">
         <div class="container">
          <h2>Friend Request</h2>
          <img src="res/img/male.png" width="100px" height="100px">
          <h3> John Maged </h3>
          <div class="requestButtons">
          <button class="accept">Accept</button>
          <button class="decline">Decline</button>
          </div>

         </div>
       </div>
     </body>

     </html>
