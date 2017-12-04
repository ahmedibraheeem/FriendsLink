<?php

  session_start();

  if(isset($_SESSION["id"])){
    echo "Welcome bro!!!!! " . $_SESSION["id"];
  }

 ?>

<!DOCTYPE HTML>

<html>

<body>
<form method="get" action="logout.php">

 <input type="submit" value="LOG ME THE FUCK OUT">

</form>
<body>

</html>
