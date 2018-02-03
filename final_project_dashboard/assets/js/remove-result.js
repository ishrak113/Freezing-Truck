
$(document).ready(function () {
  $('.remove-result').click(function (event) {
    // alert('lol');
    var _this = $(this);
    var rowValue = $(this).attr('data-row');
    if (window.confirm("Remove from table !"))
    {
      var dataToSend = { id: rowValue };

      $.post("../php/_remove-result.php", dataToSend, function(data, status){
          if(status === 'success')
          {
             _this.parent().parent().remove();
          }
        });

    }

  });

});
