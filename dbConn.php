<?php

function openCon(){

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpassowrd = "";
  $dbname = "FriendsLink";

  $db = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpassowrd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

  return $db;

}



 ?>
