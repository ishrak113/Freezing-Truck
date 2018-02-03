$(document).ready(function() {

  $("#emailCheck").keyup(function() {
    // alert("lol");
    var userName = $("#emailCheck").val();
    if (userName) {
      var dataToSend = { content: userName };
      $.post("../php/_check-email.php", dataToSend, function(data, status){

          if(status === 'success')
          {
            //  alert(data);
            if (data) {
              $("#errorEmail").css("display","block")
               $("#btnCreateAdmin").css("display","none")
            }
            else {
              $("#errorEmail").css("display","none")
              $("#btnCreateAdmin").css("display","block")
            }


          }

        });

    }
  });

});
