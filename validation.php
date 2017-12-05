<?php


function validateEmail($email)
{
    $regex = "/^[A-Z0-9.-_%+]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i";
    return preg_match($regex, $email);
}

function validateImage($files){

  $result = array();
  $allowedExtn = array("jpg", "png","jpeg");
  $pp_dir = "uploads/pp/";
  $imgFile = basename($files["profilePicture"]["name"]);
  $imgExtn = pathinfo($imgFile, PATHINFO_EXTENSION);

  if(!in_array(strtolower($imgExtn),$allowedExtn)){
    $result["valid"] = false;
    $result["error"] = "Not allowed file extension, JPG, PNG and JPEG are only supported.";
    return $result;
  }

  $randomFileName = uniqid("PP_") . "." . $imgExtn;

  $isImage = getimagesize($files["profilePicture"]["tmp_name"]);

  if($isImage !== false){
    $target = $pp_dir . $randomFileName;
    $result["valid"] = true;
    $result["target"] = $target;
    return $result;
  } else{
    $result["valid"] = false;
    $result["error"] = "Invalid image file.";
    return $result;
  }
}

function Err($data, $errMsg){
  $data["success"] = false;
  $data["error"] = $errMsg;
  echo json_encode($data);
}

?>
