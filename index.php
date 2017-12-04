<!DOCTYPE HTML>

<html>

<head>

    <title>Friends Link!</title>

</head>

<body>
    <form method="POST">
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
                <option value="signle">Single</option>
                <option value="in-relationship">In Relationship</option>
                <option value="engaged">Engaged</option>
                <option value="married">Married</option>
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
