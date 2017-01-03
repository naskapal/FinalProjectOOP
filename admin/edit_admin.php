<?php include_once $_SERVER['DOCUMENT_ROOT']."/FinalProjectOOP/core/init_inside.php";
include_once '../assets/adminHeader.php';
if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}
  $adminDetails = $_admin->admin_details(Input::get('username'));
?>
TOLEK
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-6">
            <form action="saveEdit.php.php" method="POST">
            <table align="center" class="table table-bordered table-hover">
            <tr>
                <td colspan="3" align="center">User Data</td>
            </tr>
            <tr>
                <td>AdminID</td>
                <td>:</td>
                <td><?php echo $row['id'];?><input type="hidden" name="adminID" value="<?php echo $row['id'];?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $row['user'];?><input type="hidden" name="username" value="<?php echo $row['user'];?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="text" name="password" value="<?php echo $row['password'];?>"></td>
            </tr>
            <tr>
                <td>Access</td>
                <td>:</td>
                <td>
                <select name="access">
                    <option value="<?php echo $row['access'];?>" selected="selected"><?php echo $row['access']; ?></option>
                    <option value="admin">Admin</option>
                    <option value="academic">Academic</option>
                </select>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                <input type="submit" onclick='return edit()' name="editAdmin" value="Edit">
                </td>
            </tr>
            </table>
            </form>

        </div>
    </div>
  </div>

<?php include_once '../assets/adminFooter.php'; ?>
