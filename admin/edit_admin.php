<?php include_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";
include_once '../assets/adminHeader.php';
if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}
  $adminDetails = $_admin->admin_details(Input::get('username'));
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-6">
            <form action="saveEdit.php" method="POST">
            <table align="center" class="table table-bordered table-hover">
            <tr>
                <td colspan="3" align="center">User Data</td>
            </tr>
            <tr>
                <td>AdminID</td>
                <td>:</td>
                <td><?php echo $adminDetails['adminID'];?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $adminDetails['username'];?></td>
            </tr>
            <tr>
                <td>Access</td>
                <td>:</td>
                <td>
                <select name="access">
                  <?php
                  if ($adminDetails['access'] == "admin")
                  {
                    echo "<option value='admin' selected>admin</option>
                    <option value='academic'>academic</option>";
                  }
                  else {
                    echo "<option value='admin'>admin</option>
                    <option value='academic' selected>academic</option>";
                  }
                   ?>


                </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                <input type="submit" onclick='return edit(<?php $adminDetails['username']; ?>)' name="editAdmin" value="Edit">
                </td>
            </tr>
            </table>
            </form>

        </div>
    </div>
  </div>

<?php include_once '../assets/adminFooter.php'; ?>
