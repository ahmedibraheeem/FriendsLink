$(document).ready(function() {

  $("#registerForm").submit(function(event) {
    //console.log(event);

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
    };

    $.ajax({
      type: 'POST',
      url: 'registeration.php',
      data: formData,
      dataType: 'json',
      encode: true
    })

      .done(function(data){
        console.log(data.arr);
        if(data.success){
          location.href = "";
        } else{
          $("#errorLb").html(data.errors.message);
        }
      })
      .fail(function(data){
        console.log(data);
        console.log("ajax failed");
      });

      event.preventDefault();

  });



});
