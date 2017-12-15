$(document).ready(function(){

  $(".accept").click(function(){
    var id = $(this).attr('id');
    let data = {
      "type": "accept",
      "targetID": id,
      "userID": $("#hdnId").val()
    };

    console.log(id);

    $.ajax({
      url: 'frhandle.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      encode: true
    })
    .done(function(data){
      console.log(data);
    });

    $("button[id="+id+"]").prop('disabled',true).css('opacity',0.5).css('cursor', 'default');
    $(this).html("Accepted");
  });

  $(".decline").click(function(){
    var id = $(this).attr('id');
    let data = {
      "type": "decline",
      "targetID": id,
      "userID": $("#hdnId").val()
    };

    console.log(id);

    $.ajax({
      url: 'frhandle.php',
      type: 'POST',
      data: data,
      dataType: 'json',
      encode: true
    })
    .done(function(data){
      console.log(data);
    });

    $("button[id="+id+"]").prop('disabled',true).css('opacity',0.5).css('cursor', 'default');
    $(this).html("Declined");
  });

});
