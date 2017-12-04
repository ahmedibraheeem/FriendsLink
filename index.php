<?php

  session_start();

  if(isset($_SESSION["id"])){
    header("Location: welcome.php");
    exit();
  }

 ?>


<!DOCTYPE HTML>

<html>

<head>

    <title>Friends Link!</title>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/core.js"></script>
</head>

<body>
    <div>
      <form id="loginForm" method="POST" action="login.php">
        <table>
          <tr>
            <td><label>Email</label></td>
            <td><label>Password</label></td>
          </tr>
          <tr>
            <td><input id="loginEmail" type="text" width="50"></td>
            <td><input id="loginPassword" type="password" width="50"></td>
            <td><input type="submit" width="25"></td>
          </tr>
          <tr>
            <td><label id="loginErr"></label></td>
          </tr>
        </table>
      </form>
    </div>
    <br>
    <label id="errorLb"></label>
    <form id="registerForm" method="POST" action="registeration.php" enctype="multipart/form-data">
        <div>
            <label for="fName">First Name <span style="color:red">*</span>:</label>
            <input type="text" value="h" id="fNameIp">
        </div>
        <div>
            <label>Last Name<span style="color:red">*</span>:</label>
            <input type="text" value="b" id="lNameIp">
        </div>
        <div>
            <label>Nickname:</label>
            <input type="text" value="" id="nickIp">
        </div>
        <div>
            <label>Password<span style="color:red">*</span>:</label>
            <input type="password" value="123" id="passIp">
        </div>
        <div>
            <label>Phone Number 1:</label>
            <input type="tel" id="phoneAIp">
        </div>
        <div>
            <label>Phone Number 2:</label>
            <input type="tel" id="phoneBIp">
        </div>

        <div>
            <label>Email <span style="color:red">*</span>:</label>
            <input type="text" id="emailIp">
        </div>

        <div>
            <label>Gender <span style="color:red">*</span>:</label>
            <select name="gender" id="genderSel">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div>
            <label>Birthday <span style="color:red">*</span>:</label>
            <input type="date" value="1991-01-01" id="bDayIp">
        </div>

        <div>
            <label>Hometown:</label>
            <input type="text" id="cityIp">
        </div>

        <div>
            <label>Martial Status:</label>
            <select name="mStatus" id="mStatusSel">
                <option value="" selected>Select Status</option>
                <option value="Single">Single</option>
                <option value="In Relationship">In Relationship</option>
                <option value="Engaged">Engaged</option>
                <option value="Married">Married</option>
            </select>
        </div>

        <div>
            <label>About me:</label>
            <input type="text" id="aboutIp">
        </div>

        <div>
          <label>Profile Picture:</label>
          <input type="file" id="profilePicture">
        </div>
        <input type="submit">
    </form>
</body>

</html>
