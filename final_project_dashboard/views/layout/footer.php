<!-- jQuery -->
<script src="<?php echo $baseUrl.'assets/js/jquery.min.js'?>"></script>
<!-- Bootstrap -->
<script src="<?php echo $baseUrl.'assets/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo $baseUrl.'assets/js/fastclick.js'?>"></script>
<!-- NProgress -->
<script src="<?php echo $baseUrl.'assets/js/nprogress.js'?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo $baseUrl.'assets/js/custom.min.js'?>"></script>

<?php if($page_slug == "home" || $page_slug =="change-date") { ?>
  <!-- Extra for Home -->
  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/date.js'?>"></script>

<?php }?>

<?php if($page_slug == "manage-admin-super" || $page_slug == "manage-admin-moderator") { ?>

  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/approve-admin.js'?>"></script>

<?php }?>

<?php if($page_slug == "create-admin") { ?>

  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/check-username.js'?>"></script>
  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/check-email.js'?>"></script>

<?php }?>

<?php if($page_slug == "update-admin") { ?>
  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/check-email.js'?>"></script>
<?php }?>

<?php if($page_slug == "result") { ?>
  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/remove-result.js'?>"></script>
  <!-- Datatables -->
  <script src="<?php echo $baseUrl.'assets/js/jquery.dataTables.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/dataTables.bootstrap.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/dataTables.buttons.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/buttons.bootstrap.min.js'?>"></script>

  <script src="<?php echo $baseUrl.'assets/js/dataTables.responsive.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/responsive.bootstrap.js'?>"></script>

  <!-- Datatables -->
  <script>
    $(document).ready(function() {
      $('#datatable').dataTable();
      $('#datatable-responsive').DataTable();
      TableManageButtons.init();
    });
  </script>
  <!-- /Datatables -->
<?php }?>
<?php if($page_slug == "manage-rides") { ?>
  <script type="text/javascript" src="<?php echo $baseUrl.'assets/js/remove-rides.js'?>"></script>
  <!-- Datatables -->
  <script src="<?php echo $baseUrl.'assets/js/jquery.dataTables.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/dataTables.bootstrap.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/dataTables.buttons.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/buttons.bootstrap.min.js'?>"></script>

  <script src="<?php echo $baseUrl.'assets/js/dataTables.responsive.min.js'?>"></script>
  <script src="<?php echo $baseUrl.'assets/js/responsive.bootstrap.js'?>"></script>

  <!-- Datatables -->
  <script>
    $(document).ready(function() {
      $('#datatable').dataTable();
      $('#datatable-responsive').DataTable();
      TableManageButtons.init();
    });
  </script>
  <!-- /Datatables -->
<?php }?>

<?php if($page_slug == "map") { ?>
  <script>

  function initMap() {
    var $_GET = {};
    document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
    return decodeURIComponent(s.split("+").join(" "));
    }
    $_GET[decode(arguments[1])] = decode(arguments[2]);
    });
    var latitude =$_GET['lt'];
    var longitude =$_GET['lg'];

    latitude =Number(latitude);
    longitude =Number(longitude);

    var uluru = {lat: latitude, lng: longitude};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }

  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH9L-gT6N9nYqFhxJ2UivB1AInnzdodTk&callback=initMap">
    </script>
<?php }?>


<script type="application/javascript">
    $(document).ready(function () {

      var fullDate = new Date();
      var date = fullDate.getDate();
      if (date<10) {
        date = date.toString();
        date = '0'+date;
      }
      else {
        date = date.toString();
      }


      // finding month
      var month  = fullDate.getMonth();
      month = month +1;
      if (month<10) {
        month = month.toString();
        month = '0'+month;
      }
      else {
        month = month.toString();
      }
      // alert(month);


// finding year
      var year = fullDate.getYear();
        year = year.toString();
      var yearSlice = year.slice(1);


      var Daydate = yearSlice+'/'+month+'/'+date;
      var PostDate = yearSlice+month+date;

      document.getElementById('newsDate').value = Daydate;
      document.getElementById('postDate').value = PostDate;


    });
</script>




<!-- footer content -->
<footer>
  <div class="pull-right">
    Website - Bootstrap Admin Template by <a href=""><?php echo $websiteName ?></a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->

      </div>
    </div>
  </body>
</html>
