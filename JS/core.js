$(document).ready(function(){

  $("registerForm").submit(function(event){
    var formData = {
      "fName": $("#fNameIp").val(),
      "lName": $("#lNameIp").val(),
      "nickname": $("#nickIp").val(),
      "password": $("#passIp").val(),
      "phoneA": $("#phoneAIp").val(),
      "phoneB": $("#phoneBIp").val(),
      "email": $("#emailIp").val(),
      "birthday": $("#bDayIp").val(),
      "hometown": $("#cityIp").val(),
      "aboutMe": $("#aboutIp").val(),
      "mStatus": $("#mStatusSel option:selected").val(),
      "gender": $("#genderSel option:selected").val()
    }
  });



});
