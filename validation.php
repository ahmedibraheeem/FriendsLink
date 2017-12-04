<?php


function validateEmail($email)
{
    $regex = "/^[A-Z0-9.-_%+]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i";
    return preg_match($regex, $email);
}

function Err($data, $errors){
  $data["success"] = false;
  $data["errors"] = $errors;
  echo json_encode($data);
}

?>
