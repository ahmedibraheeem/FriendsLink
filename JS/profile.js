$(document).ready(function() {

  $("#logoutBtn").click(function() {
    window.location="logout.php";
  });

  $("#editBtn").click(function() {
    window.location="editprofile.php";
  });

  $("#addfriend").submit(function(event){

    event.preventDefault();
    var formData = {
      "requesterID": $("#requesterID").val(),
      "friendID": $("#friendID").val()
    }

    console.log(formData);
    $.ajax({
      type: "POST",
      url: "addFriend.php",
      data: formData,
      dataType: 'json',
      encode: true
    })
      .done(function(data){
        console.log(data);
        if(data.success){
          $("#addFriendBtn").val("Request Sent");
          $('#addFriendBtn').prop('disabled',true).css('opacity',0.5).css('cursor', 'default');
        }
      })
      .fail(function(data){
        console.log(data);
      });

  });

});
