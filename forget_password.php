<?php

// require_once $_SERVER['DOCUMENT_ROOT']."/FinalProjectOOP/core/init_inside.php";
// include_once $_SERVER['DOCUMENT_ROOT']."/FinalProjectOOP/classes/Mail.php";
//
// private $_db;
// private $_mail;


 ?>
<form action="check_forget_password.php" method="post">
Input your username and email here, if the username and email matched, we will reset the password and email it to you
<table>
  <tr>
    <td>Username</td>
    <td><input type="text" name="username"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email"></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><input type="submit" name="Reset Password" value="forget_password"></td>
  </tr>
</table>

</form>
