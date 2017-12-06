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
  <link rel="stylesheet" type="text/css" href="res/css/editprofile.css">
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
  </div>
  <div class="editWrapper">
  <form id="editForm" method="POST" action="updateProfile.php">
    <div class="editFiled">
      <label>First Name:</label>
      <input type="text" value="<?php echo $userData["fName"]?>" id="fName" name="fName">
    </div>
    <div class="editFiled">
      <label>Last Name:</label>
      <input type="text" value="<?php echo $userData["lName"]?>" id="lName" name="lName">
    </div>
    <div class="editFiled">
      <label>Nickname:</label>
      <input disabled="disabled" type="text" value="<?php echo $userData["nickname"]?>" id="nickname" id="nickname">
    </div>
    <div class="editFiled">
      <label>password:</label>
      <input type="password" id="password" name="password">
    </div>
    <div class="editFiled">
      <label>Email:</label>
      <input type="text" value="<?php echo $userData["email"]?>" id="email" name="email">
    </div>
    <div class="editFiled">
      <label>Hometown:</label>
      <input type="text" value="<?php echo $userData["hometown"]?>" id="hometown" name="hometown">
    </div>
    <div class="editFiled">
      <label>About Me:</label>
      <input type="text" value="<?php echo $userData["about"]?>" id="about" name="about">
    </div>
    <div class="editFiled">
      <label>Birthday:</label>
      <input type="date" value="<?php echo $userData["bDay"]?>" id="bDay" name="bDay">
    </div>
    <div class="editFiled">
        <label>Martial Status:</label>
        <select name="martialStatus" id="mStatusSel">
            <option value="">Select Status</option>
            <option value="Single" <?php if($userData["martialStatus"] == "Single") echo "selected";?>>Single</option>
            <option value="In Relationship" <?php if($userData["martialStatus"] == "In Relationship") echo "selected";?>>In Relationship</option>
            <option value="Engaged" <?php if($userData["martialStatus"] == "Engaged") echo "selected";?>>Engaged</option>
            <option value="Married" <?php if($userData["martialStatus"] == "Married") echo "selected";?>>Married</option>
        </select>
    </div>
    <div>
    <input id="update" type="submit" value="Update Info">
  </div>
  </form>
</div>
</body>
</html>
