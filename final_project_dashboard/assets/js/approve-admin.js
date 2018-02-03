
$(document).ready(function () {
  $('.deactivate-admin').click(function (event) {
    // alert('lol');
    var _this = $(this);
    var rowValue = $(this).attr('data-admin');
    if (window.confirm("This admin will deactivate !"))
    {
      var dataToSend = { deactivateAdminId: rowValue };

      $.post("../php/_approve-admin.php", dataToSend, function(data, status){
          if(status === 'success')
          {

             _this.remove();
          }
        });

    }
    // else {
    // 	window.location.open('http://www.w3schools.com');
    // }
  });

  $('.activate-admin').click(function (event) {
    // alert('lol');
    var _this = $(this);
    var rowValue = $(this).attr('data-admin');
    if (window.confirm("Activate this admin !"))
    {
      var dataToSend = { activateAdminId: rowValue };
      $.post("../php/_approve-admin.php", dataToSend, function(data, status){
          if(status === 'success')
          {
             _this.remove();
          }
        });

    }
    // else {
    // 	window.location.open('http://www.w3schools.com');
    // }
  });


});
