<?php

require('../config.php');
include('../assets/adminHeader.php');

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}
 ?>
<form class="" action="saveClub.php" method="post">

<table align="center" class="table table-bordered table-hover">
  <tr>
    <td>Club ID</td>
    <td>:</td>
    <td><input type="text" name="clubID" value=""></td>
  </tr>
  <tr>
    <td>Club Name</td>
    <td>:</td>
    <td><input type="text" name="clubName" value=""></td>
  </tr>
  <tr>
    <td>Username</td>
    <td>:</td>
    <td><input type="text" name="username" value=""></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="password" value=""></td>
  </tr>
  <tr>
    <td colspan="3" align="right"><input type="submit" name="addClub" value="Add"></td>
  </tr>
</table>

</form>
