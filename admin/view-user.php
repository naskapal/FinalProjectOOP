</form>
<table align="center" border="1" class="table table-bordered table-hover">
<tr>
	<th colspan="5" align="center">Event Data</th>
</tr>
<tr>
	<td><strong>Admin ID</strong></td>
    <td><strong>username</strong></td>
    <td><strong>Access</strong></td>
		<td colspan="2"><strong>Action</strong></td>
</tr>

<?php
if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}
  $adminList = $_admin->admin_list();
?>

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Manage User
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Admin List</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Projects Row -->
       <div class="row">

          <?php
              if($adminList ->num_rows > 0){
                while($row = $adminList->fetch_assoc()){
									echo "<tr>";
									echo "<td>".$row['adminID']."</td>";
									echo "<td>".$row['username']."</td>";
									echo "<td>".$row['access']."</td>";
									echo "<td> <a href = edit_admin.php?username=".$row['username'].">edit</a></td>";
									echo "</tr>";?>


          <?php
                }
              }
          ?>
