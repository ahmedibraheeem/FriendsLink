<?php

  session_start();

  if(isset($_SESSION["UserEmail"])){
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
        <table>
          <tr>
            <td><label>Email</label></td>
            <td><label>Password</label></td>
          </tr>
          <tr>
            <td><input type="text" width="50"></td>
            <td><input type="password" width="50"></td>
            <td><input type="submit" width="25"></td>
          </tr>

        </table>

    </div>
    <label id="errorLb"></label>
    <form id="registerForm" method="POST" action="registeration.php">
        <div>
            <label>First Name <span style="color:red">*</span>:</label>
            <input type="text" id="fNameIp">
        </div>
        <div>
            <label>Last Name<span style="color:red">*</span>:</label>
            <input type="text" id="lNameIp">
        </div>
        <div>
            <label>Nickname:</label>
            <input type="text" id="nickIp">
        </div>
        <div>
            <label>Password<span style="color:red">*</span>:</label>
            <input type="password" id="passIp">
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
            <select name="genderSelection" id="genderSel">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div>
            <label>Birthday <span style="color:red">*</span>:</label>
            <input type="date" id="bDayIp">
        </div>

        <div>
            <label>Hometown:</label>
            <input type="text" id="cityIp">
        </div>

        <div>
            <label>Martial Status:</label>
            <select name="mStatusSelection" id="mStatusSel">
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
        <input type="submit">
    </form>
</body>

</html>
