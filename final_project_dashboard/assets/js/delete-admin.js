
$(document).ready(function () {
  $('.delete-admin').click(function (event) {
    // alert('lol');
    var _this = $(this);
    var rowValue = $(this).attr('data-row');
    if (window.confirm("Delete This Admin!"))
    {
      var dataToSend = { contentId: rowValue };
      $.post("../php/_delete-admin.php", dataToSend, function(data, status){
          if(status === 'success')
          {
             window.open("http://localhost/Admin/", "_parent");
          }
        });
      // window.location = "_delete-notice-news.php?contentId=" + rowValue;
    }
    // else {
    // 	window.location.open('http://www.w3schools.com');
    // }
  });
});
