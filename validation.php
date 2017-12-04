<?php


function validateEmail($email)
{
    $regex = "/^[A-Z0-9.-_%+]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i";
    return preg_match($regex, $email);
}

function Err($data, $errMsg){
  $data["success"] = false;
  $data["error"] = $errMsg;
  echo json_encode($data);
}

?>
