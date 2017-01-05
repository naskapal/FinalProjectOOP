<?php

require('../config.php');
include_once '../assets/academicHeader.php';

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}

$student = $_admin->student_list();

 ?>

 <table align="center" border="1" class="table table-bordered table-hover">
 <tr>
 	<th colspan="5" align="center">Event Data</th>
 </tr>
 <tr>
 	<td><strong>NIM</strong></td>
     <td><strong>Name</strong></td>
     <td><strong>SKKM Point</strong></td>
 </tr>

 <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">View Students
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">View Students</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">

           <?php
               if($student ->num_rows > 0){
                 while($row = $student->fetch_assoc()){
 									echo "<tr>";
 									echo "<td>".$row['nim']."</td>";
 									echo "<td>".$row['name']."</td>";
 									echo "<td>".$row['skkm_point']."</td>";
 									echo "</tr>";

 									?>
           <?php
                 }
               }
           ?>
