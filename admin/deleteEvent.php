<?php
include_once $_SERVER['DOCUMENT_ROOT']."/FinalProjectOOP/core/init_inside.php";
if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}

if (Input::get('eventID')!= null) {
  if($_admin->delete_event(Input::get('eventID')))
  {
    echo "<script> alert('Delete Success'); location.href = 'admin-page.php?cek=event';
    </script>";
  }
}

 ?>
