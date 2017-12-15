<?php

  include_once "dbQueries.php";

  session_start();

  if (!isset($_SESSION["id"]) || $_SERVER['REQUEST_METHOD']!="POST") {
      header("Location:index.php");
      exit();
  }

  $email = $_POST["email"];
  $fName = $_POST["fName"];
  $lName = $_POST["lName"];
  $hometown = $_POST["hometown"];

  //print_r($_POST);

  $page = isset($_GET["pages"]) ? $_GET["pages"] : 1;
  $pageLimit = 10;
  $offset = ($page - 1) * $pageLimit;
  $result = advSearch($email, $fName, $lName, $hometown, $pageLimit, $offset);
  $rows = $result["count"];
  $count = intval($rows) - 1;
  $users = $result["data"];
  print_r($users);
  $totalPages = ceil($count / $pageLimit);
?>
<!DOCTYPE HTML>


<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link href="res/css/people.css" rel="stylesheet">
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

  <p>Search Result</p>

  <div class="peopleWrapper">
    <?php
      $div = "<div class=\"peopleField\">";
      $divE = "</div>";
      for ($i=0;$i<sizeof($users);$i++) {
          echo $div;
          echo "<img class=\"userPic\" src=\"".$users[$i]["profilePicture"]."\">";
          echo "<div class =\"container\">";
          echo "<a href=\"profile.php?id=".$users[$i]["ID"]."\">";
          echo "<label>";
          echo ($users[$i]["nickname"] !== null) ? $users[$i]["nickname"] : $users[$i]["name"];
          echo "</label>";
          echo "</a>";
          echo "</div>";
          echo $divE;
      }
     ?>
  </div>

  <div class="pagination">
    <?php
    if($page > 1){
      echo "<a href=\"people.php?pages=" . (string)($page-1) . "\">";
      echo "Previous Page";
      echo "</a>";
    }
    if ($page < $totalPages) {
        echo "<a href=\"people.php?pages=" . (string)($page+1) . "\">";
        echo "Next Page";
        echo "</a>";
    }
    ?>
  </div>
</body>
</html>
