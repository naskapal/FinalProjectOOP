<?php
require('../config.php');

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}

if (Input::get('eventID')!= null) {
  if($_admin->delete_event(Input::get('eventID')))
  {
    echo "<script> alert('Delete Success'); location.href = 'admin-page.php?cek=event';
    </script>";
  }
}

 ?>
