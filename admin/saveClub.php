<?php

require('../config.php');
include('../assets/adminHeader.php');

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}

if (Input::get('addClub') != null)
{
  $club = array('club_id' => Input::get('clubID'),
                'club_name' => Input::get('clubName'),
                'username' => Input::get('username'),
                'password' => password_hash(Input::get('password'),PASSWORD_DEFAULT),
                'imagepath' => null,
                'short_desc' => null,
                'club_desc' => null);

  if ($_admin->insert_new_club($club))
  {
    echo "<script>
    	alert('Add Club Success');
    	location.href = 'admin-page.php?cek=user';
    </script>";
  }
  else
  {
    echo '<script>
        alert("Fail!");
        location.href = "admin-page.php?cek=user";
      </script>';
  }
}

 ?>
