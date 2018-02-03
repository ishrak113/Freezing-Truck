
<?php

function create_admin_id($serials,$prefix){
  $newadminid=$prefix.$serials;
  return $newadminid;
}

function find_all_admins(){

}

function find_admin_by_id(){


}

function password_encrypt($password,$user_id){
  $hash_type = "$2y$10$";
  $salt_length = 22;
  $salt = generate_salt($salt_length);
  // pass_salt($salt,$user_id); // PASS salt for insert database
  $GLOBALS['admin_hash'] = $salt;
  $hash_and_salt = $hash_type.$salt;
  $admin_password = crypt($password,$hash_and_salt);

  return $admin_password;
}

function generate_salt($length){
  $random_string=md5(uniqid(mt_rand(), true));
  $base64_string = base64_encode($random_string);
  $modified_base64_string = str_replace('+','.',$base64_string);
  $salt = substr($modified_base64_string,0,$length);

  return $salt;
}

function password_check($passwordCheck,$salt){
  $hash_type = "$2y$10$";
  $hash_and_salt = $hash_type.$salt;
  $recent_pass = crypt($passwordCheck,$hash_and_salt);

  return $recent_pass;
}

function attempt_login($password,$existing_hash,$existing_password)
{
  $checkPass = password_check($password,$existing_hash);
  if ($checkPass===$existing_password) {
    return true;
  }else {
    return false;
  }
}

function logged_in()
{
  return isset($_SESSION["admin_id"]);
}

function confirm_logged_in()
{
  if (!logged_in()) {
    header("location:../logout.php");
  }
}





 ?>
