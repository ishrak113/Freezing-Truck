<?php
include_once ("_header.php");

include_once ("../../vendor/autoload.php");
use App\Admin\Admin;

$b = new Admin();
$row = $b->find_super_admin();

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <h4>Super Admin's</h4>
  <table class="admin-list">
    <?php
    foreach ($row as $admin ) {
      echo '<tr>';
        echo '<td class="col-lg-4 col-md-4">'.$admin['user_name'].'</td>';
        echo '<td class="col-lg-4 col-md-4">'.$admin['email'].'</td>';
        if ($admin['token']=='0') {
          echo '<td class="col-lg-2 col-md-2"><a href="" data-admin="'.$admin['user_id'].'" class="btn btn-danger deactivate-admin">Deactivate</a></td>';
        }else {
          echo '<td class="col-lg-2 col-md-2"><a href="" data-admin="'.$admin['user_id'].'" class="btn btn-success activate-admin">Activate</a></td>';
        }
      echo '</tr>';
    }
     ?>
  </table>
</div>


<?php
$row = $b->find_moderator_admin();

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <h4>Moderator Admin's</h4>
  <table class="admin-list">
    <?php
    foreach ($row as $admin ) {
      echo '<tr>';
        echo '<td class="col-lg-4 col-md-4">'.$admin['user_name'].'</td>';
        echo '<td class="col-lg-4 col-md-4">'.$admin['email'].'</td>';
        if ($admin['token']=='0') {
          echo '<td class="col-lg-2 col-md-2"><a href="" data-admin="'.$admin['user_id'].'" class="btn btn-danger deactivate-admin">Deactivate</a></td>';
        }else {
          echo '<td class="col-lg-2 col-md-2"><a href="" data-admin="'.$admin['user_id'].'" class="btn btn-success activate-admin">Activate</a></td>';
        }

      echo '</tr>';
    }
     ?>
  </table>
</div>


<?php
$row = $b->find_editor_admin();

?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <h4>Editor Admin's</h4>
  <table class="admin-list">
    <?php
    foreach ($row as $admin ) {
      echo '<tr>';
        echo '<td class="col-lg-4 col-md-4">'.$admin['user_name'].'</td>';
        echo '<td class="col-lg-4 col-md-4">'.$admin['email'].'</td>';

        if ($admin['token']=='0') {
          echo '<td class="col-lg-2 col-md-2"><a href="" data-admin="'.$admin['user_id'].'" class="btn btn-danger deactivate-admin">Deactivate</a></td>';
        }else {
          echo '<td class="col-lg-2 col-md-2"><a href="" data-admin="'.$admin['user_id'].'" class="btn btn-success activate-admin">Activate</a></td>';
        }
      echo '</tr>';
    }
     ?>
  </table>
</div>
