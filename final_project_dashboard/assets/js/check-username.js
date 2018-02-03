$(document).ready(function() {

  $("#userNameCheck").keyup(function() {
    // alert("lol");
    var userName = $("#userNameCheck").val();
    if (userName) {
      var dataToSend = { content: userName };
      $.post("../php/_check-username.php", dataToSend, function(data, status){

          if(status === 'success')
          {
            //  alert(data);
            if (data) {
               $("#errorUsername").css("display","block")
               $("#btnCreateAdmin").css("display","none")
            }
            else {
              $("#errorUsername").css("display","none")
              $("#btnCreateAdmin").css("display","block")
            }


          }

        });

    }
  });

});
