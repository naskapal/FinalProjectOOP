<?php

require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$id = $student->student_details(Session::get('username'));
$ticket = $student->get_tickets($id['nim']);
require_once "../templates/header_student.php";
 ?>

 <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">

        <table align="center" border="1" class="table table-bordered table-hover">
        <tr>
        	<th colspan="5" align="center">Event Data</th>
        </tr>
        <tr>
        	<td><strong>Transaction ID</strong></td>
            <td><strong>Ticket ID</strong></td>
            <td><strong>Transaction Date</strong></td>
            <td><strong>nim</strong></td>
            <td><strong>details</strong></td>
        </tr>



           <?php
               if($ticket ->num_rows > 0){
                 while($row = $ticket->fetch_assoc()){
                   echo "<tr>";
                   echo "<td>".$row['transID']."</td>";
                   echo "<td>".$row['ticketID']."</td>";
                   echo "<td>".$row['transDate']."</td>";
                   echo "<td>".$row['nim']."</td>";
                   echo "<td><a class = 'btn btn-default' href='ticket_detail.php?transID=".$row['transID']."' role='button'>View Ticket Details</a></td>";
                   echo "</tr>";

                   ?>
           <?php
                 }
               }
           ?>
         </table>
</div>

    </div>
    <!-- /.container -->


 <?php
require_once "../templates/footer_student.php";
  ?>
