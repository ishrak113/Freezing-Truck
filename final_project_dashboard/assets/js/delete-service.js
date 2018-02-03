
$(document).ready(function () {
  $('.delete-service').click(function (event) {
    // alert('lol');
    var _this = $(this);
    var rowValue = $(this).attr('data-row');
    if (window.confirm("Delete This Service !"))
    {
      var dataToSend = { id: rowValue };

      $.post("../php/_delete-service.php", dataToSend, function(data, status){
          if(status === 'success')
          {
             _this.parent().parent().remove();
          }
        });

    }

  });

});
