<?php
require('../config.php');
require_once MYFOLDER_PATH ."/core/init_inside.php";

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

if(Session::exist('profile')){
  echo Session::flash('profile');
}

$user_data = $student->get_data(Session::get('username'));

require_once "../templates/header_student.php";
 ?>

<h2>Hai <?php echo $user_data['username'];?></h2>

 <?php
require_once "../templates/footer_student.php";
  ?>
