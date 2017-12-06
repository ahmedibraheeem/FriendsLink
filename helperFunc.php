<?php

  include_once "dbQueries.php";

  function printUserData2($userData)
  {
      $arrData = array("martialStatus", "nickname", "profilePicture");
      $div = "<div class=\"infoField\"";
      $divEnd = "</div>";

      for ($i = 0; $i < sizeof($arrData) ; $i++) {
          if ($userData[$arrData[$i]] != null) {
              echo $div . "id=\"".$arrData[$i] . "\">";
              echo $arrData[$i] . ": ".$userData[$arrData[$i]];
              echo $divEnd;
          }
      }


  }
