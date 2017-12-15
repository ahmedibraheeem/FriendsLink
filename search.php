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
  <link rel="stylesheet" type="text/css" href="res/css/search.css">
  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <script>
  function required(){

    var email = document.getElementById("email").value;
    var fName = document.getElementById("fName").value;
    var lName = document.getElementById("lName").value;
    var hometown = document.getElementById("hometown").value;
    console.log(email, fName, lName, hometown);
    if(email == "" && fName == "" && lName == "" && hometown == ""){
      alert("At least one field is required.");
      return false;
    }

    return true;
  }

  </script>
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
     <a href="friendRequests.php">Friend Requests (<?php echo numberOfFriendRequests($_SESSION["id"])["count(requesterID)"]; ?>)</a>
  </div>

  <div class="searchWrapper">
  <form id="searchForm" method="POST" action="advancedSearch.php" onsubmit="return required()">
    <div class="searchFiled">
      <label>Full Email:</label>
      <input type="text" id="email" name="email">
    </div>
    <div class="searchFiled">
      <label>First Name:</label>
      <input type="text" id="fName" name="fName">
    </div>
    <div class="searchFiled">
      <label>Last Name:</label>
      <input type="text" id="lName" name="lName">
    </div>
    <div class="searchFiled">
      <label>Hometown:</label>
      <input type="text" id="hometown" name="hometown">
    </div>

    <div>
    <input id="search" type="submit" value="Search Info">
  </div>
  </form>
</div>
</body>
</html>
