<?php

require('../config.php');

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
$test = date("y/m/d");
$hula = strtotime($test);
$exp = strtotime("30-09-2017");

if($hula < $exp){
  echo $test;
}else {
  echo "tetot";
}

?>

 <?php
require_once "../templates/footer_student.php";
  ?>
