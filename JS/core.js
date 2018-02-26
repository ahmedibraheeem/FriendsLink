$(document).ready(function() {

  $("#loginForm").submit(function(event){

    let loginData = {
      "email": $("#loginEmail").val(),
      "password": $("#loginPassword").val()
    };

    console.log(loginData);

    $.ajax({
      url: "login.php",
      type: "POST",
      data: loginData,
      dataType: "json",
      encode: true
    })
    .done(function(data){
      console.log("Uhm", data);
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
