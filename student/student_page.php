<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$_student->is_LoggedIn()){
    header('location: ../login.php');
}

if(session::exist('profile')){
  echo Session::flash('profile');
}

$user_data = $_student->get_data(session::get('username'));

require_once "../templates/header_student.php";
 ?>

<h2>Hai <?php echo $user_data['username'];?></h2>

 <?php
require_once "../templates/footer_student.php";
  ?>
