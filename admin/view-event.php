
<table align="center" border="1" class="table table-bordered table-hover">
<tr>
	<th colspan="5" align="center">Event Data</th>
</tr>
<tr>
	<td><strong>No</strong></td>
    <td><strong>Event Name</strong></td>
    <td><strong>Image</strong></td>
    <td><strong>Description</strong></td>
    <td><strong>Action</strong></td>
</tr>

<?php
if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}
  $eventList = $_event->event_list();
	$apostrophe = "";
?>

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Event List
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Event List</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Projects Row -->
       <div class="row">

          <?php
              if($eventList ->num_rows > 0){
                while($row = $eventList->fetch_assoc()){
									echo "<tr>";
									echo "<td>".$row['eventID']."</td>";
									echo "<td>".$row['eventName']."</td>";
									echo "<td>".$row['imagePath']."</td>";
									echo "<td>".$row['eventDesc']."</td>";
									echo "<td><a href='#' class='btn-hapus' onclick='return del(\"". $row["eventID"] ."\")'>Hapus</a></td>";?>
									<?php	echo "</tr>";?>

          <?php
                }
              }
          ?>
