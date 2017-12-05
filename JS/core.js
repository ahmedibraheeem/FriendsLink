$(document).ready(function() {

  $("#loginForm").submit(function(event){
    let loginData = {
      "email": $("#loginEmail").val(),
      "password": $("#loginPassword").val()
    };

    $.ajax({
      url: "login.php",
      type: "POST",
      data: loginData,
      dataType: "json",
      encode: true
    })
    .done(function(data){
      if(data.success){
        location.href = "";
      } else{
        $("#loginErr").html(data.error);
      }
    });

    event.preventDefault();

  });


  $("#registerForm").submit(function(event) {

    event.preventDefault();
    var formData = new FormData(this);
    // var formData = {
    //   "fName": $("#fNameIp").val(),
    //   "lName": $("#lNameIp").val(),
    //   "nickname": $("#nickIp").val(),
    //   "password": $("#passIp").val(),
    //   "phoneA": $("#phoneAIp").val(),
    //   "phoneB": $("#phoneBIp").val(),
    //   "email": $("#emailIp").val(),
    //   "birthday": $("#bDayIp").val(),
    //   "hometown": $("#cityIp").val(),
    //   "aboutMe": $("#aboutIp").val(),
    //   "mStatus": $("#mStatusSel option:selected").val(),
    //   "gender": $("#genderSel option:selected").val()
    // };

    $.ajax({
      url: "registeration.php",
      type: "POST",
      data: formData,
      dataType: "json",
      encode: true,
      cache: false,
      contentType: false,
      processData: false
    })

      .done(function(data){
        if(data.success){
          location.href = "";
        } else{
          $("#errorLb").html(data.error);
        }
      })
      .fail(function(data){
        console.log(data);
      });

  });



});
