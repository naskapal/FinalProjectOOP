
<table align="center" border="1" class="table table-bordered table-hover">
<tr>
	<th colspan="5" align="center">Event Data</th>
</tr>
<tr>
	<td><strong>Transaction ID</strong></td>
    <td><strong>Ticket ID</strong></td>
    <td><strong>Transaction Date</strong></td>
    <td><strong>nim</strong></td>
</tr>

<?php
  $ticketTransList = $_ticket->ticketTrans_list();
	if(!$_admin->is_LoggedIn()){
	    header('location: index.php');
	}
?>

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header">Ticket Transaction
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Ticket Transaction</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Projects Row -->
       <div class="row">

          <?php
              if($ticketTransList ->num_rows > 0){
                while($row = $ticketTransList->fetch_assoc()){
									echo "<tr>";
									echo "<td>".$row['transID']."</td>";
									echo "<td>".$row['ticketID']."</td>";
									echo "<td>".$row['transDate']."</td>";
									echo "<td>".$row['nim']."</td>";
									echo "</tr>";

									?>
          <?php
                }
              }
          ?>
