<?php

  session_start();

  if(isset($_SESSION["id"])){
    header("Location: profile.php");
    exit();
  }

 ?>


<!DOCTYPE HTML>
<html>

<head>
    <title>Friends Link!</title>
    <link rel="stylesheet" type="text/css" href="res/css/home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/jquery.min.js"></script>
    <script src="JS/core.js"></script>
</head>

<body>
    <div id="loginDiv">
      <img src="res/img/friendsLinkSmall.png" id="logo">
        <form id="loginForm" method="POST" action="login.php">
            <table id="loginTab">
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <label>Password</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="loginEmail" type="text" width="50">
                    </td>
                    <td>
                        <input id="loginPassword" type="password" width="50">
                    </td>
                    <td>
                        <input type="submit" id="submitLog" value="Log In" width="25">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label id="loginErr"></label>
                    </td>
                </tr>
            </table>

        </form>
    </div>

    <br>
    <br>
    <br>

    <div id="regWrapper">
    <label id="signupLb">New to FriendsLINK?<br><span style="display:inline-block; width:35px;"></span>
Sign up now for free!</label>
    <div id="regDiv">
      <form id="registerForm" method="POST" action="registeration.php" enctype="multipart/form-data">
        <div class="regField">
            <label>First Name <span class="star">*</span>:</label>
            <input type="text" value="h" id="fNameIp" name="fName">
        </div>
        <div class="regField">
            <label>Last Name<span class="star">*</span>:</label>
            <input type="text" value="b" id="lNameIp" name="lName">
        </div>
        <div class="regField">
            <label>Nickname:</label>
            <input type="text" value="" id="nickIp" name="nickname">
        </div>
        <div class="regField">
            <label>Password<span class="star">*</span>:</label>
            <input type="password" value="123" id="passIp" name="password">
        </div>
        <div class="regField">
            <label>Phone Number 1:</label>
            <input type="tel" id="phoneAIp" name="phoneA">
        </div>
        <div class="regField">
            <label>Phone Number 2:</label>
            <input type="tel" id="phoneBIp" name="phoneB">
        </div>

        <div class="regField">
            <label>Email <span class="star">*</span>:</label>
            <input type="text" id="emailIp" name="email">
        </div>

        <div class="regField">
            <label>Gender <span class="star">*</span>:</label>
            <select name="gender" id="genderSel">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="regField">
            <label>Birthday <span class="star">*</span>:</label>
            <input type="date" value="1991-01-01" id="bDayIp" name="birthday">
        </div>

        <div class="regField">
            <label>Hometown:</label>
            <input type="text" id="cityIp" name="hometown">
        </div>

        <div class="regField">
            <label>Martial Status:</label>
            <select name="mStatus" id="mStatusSel">
                <option value="" selected>Select Status</option>
                <option value="Single">Single</option>
                <option value="In Relationship">In Relationship</option>
                <option value="Engaged">Engaged</option>
                <option value="Married">Married</option>
            </select>
        </div>

        <div class="regField">
            <label>About me:</label>
            <input type="text" id="aboutIp" name="aboutMe">
        </div>

        <div class="regField">
            <label>Profile Picture:</label>
            <input type="file" id="profilePicture" name="profilePicture">
        </div>

          <label id="errorLb"></label>

        <div class="regField">
        <input type="submit" id="submitReg" value="Sign up">
      </div>

        <br>
        <label id="notice">All fields marked with <span class="star">*</span> are required.</label>
    </form>
  </div>
</div>
</body>

</html>
