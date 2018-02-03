
$(document).ready(function () {
  $('.remove-ride').click(function (event) {
    // alert('lol');
    var _this = $(this);
    var rowValue = $(this).attr('data-row');
    if (window.confirm("Remove This Ride !"))
    {
      var dataToSend = { id: rowValue };

      $.post("../php/_remove-ride.php", dataToSend, function(data, status){
          if(status === 'success')
          {
             _this.parent().parent().remove();
          }
        });

    }

  });

});
