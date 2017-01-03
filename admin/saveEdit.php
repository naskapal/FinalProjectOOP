<?php
include_once '../core/init_inside.php';

if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}
if (Input::get("editAdmin") != null)
{
  die(Input::get('username'));
  $editedValues = array('adminID' => Input::get('adminID'),
                        'username'=> Input::get('username'),
                        'access'=>Input::get('access'));

  if ($_admin->update_admin($editedValues,Input::get('username')))
  {
    echo "<script> alert('Edit Success'); location.href = 'admin-page.php?cek=user';
    </script>";
  }

}

?>
