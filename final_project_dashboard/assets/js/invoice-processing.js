
$(document).ready(function () {
  $('#service').change(function (event) {
    var _this = $(this);
    var price = $('#service option:selected').attr('data-price');
    var serviceId = $('#service option:selected').val();
    // alert(serviceId);
    $('#serviceId').val(serviceId);
    $('#price').val(price);
    $('#serviceDescription').val('');
  });


  $('.add-item').click(function (event) {
    var s = $('#service').val();
    var price = $('#price').val();
    if (s=='select' || price==='') {
      alert("Invalide Input");
    }else {
      var service = $('#service option:selected').text();
      var serviceId = $('#serviceId').val();
      var serviceDescription = $('#serviceDescription').val();

      if (serviceDescription=='') {
        var description = '-';
      }else {
        var description = serviceDescription;
      }

      $("#productCart tr:last").after('<tr><td class="col-md-2 col-sm-2 col-xs-12">'+serviceId+'</td><td class="col-md-5 col-sm-5 col-xs-12">'+service+'</td><td class="col-md-2 col-sm-2 col-xs-12">'+price+'</td><td><a data-item="'+serviceId+'" class="btn btn-danger remove-cart" >Remove</a></td></tr>')
      var dataToSend = { itemId: serviceId, des: description };
      $.post('../php/_add-to-cart.php', dataToSend, function (data,status) {
        if (status === "success") {
          console.log(data);
        }
      });

    }
  });

  $(document).on("click",".remove-cart",function (event) {
    var _this = $(this);
    var item = $(this).attr("data-item");
    var dataToSend = { itemId: item };
    $.post('../php/_delete-from-cart.php', dataToSend, function (data,status) {
      if (status === "success") {
        _this.parent().parent().remove();
        // alert(data);
      }
    });

  });


});
