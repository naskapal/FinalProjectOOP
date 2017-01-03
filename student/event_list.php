<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$result = $_event->event_list();






require_once "../templates/header_student.php";
 ?>

<!-- content -->

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
              if($result ->num_rows > 0){
                while($row = $result->fetch_assoc()){ ?>
                  <div class="col-md-4 img-portfolio">
                      <a href="<?php echo 'event_details.php?eventID='.$row['eventID']; ?>">
                          <img class="img-responsive img-hover" src="<?php echo '../assets/img/event/'.$row['imagePath'];?>" alt="">
                      </a>
                      <h3>
                          <a href="<?php echo 'event_details.php?eventID='.$row['eventID']; ?>"><?php echo $row['eventName']; ?></a>
                      </h3>
                      <p><?php echo $row['eventDesc']; ?></p>
                  </div>

          <?php
                }
              }
          ?>



       </div>
       <!-- /.row -->



       <hr>

       <!-- Pagination -->
       <div class="row text-center">
           <div class="col-lg-12">
               <ul class="pagination">
                   <li>
                       <a href="#">&laquo;</a>
                   </li>
                   <li class="active">
                       <a href="#">1</a>
                   </li>
                   <li>
                       <a href="#">2</a>
                   </li>
                   <li>
                       <a href="#">3</a>
                   </li>
                   <li>
                       <a href="#">4</a>
                   </li>
                   <li>
                       <a href="#">5</a>
                   </li>
                   <li>
                       <a href="#">&raquo;</a>
                   </li>
               </ul>
           </div>
       </div>
       <!-- /.row -->

       <hr>


   </div>
   <!-- /.container -->





<!-- end content -->

 <?php
require_once "../templates/footer_student.php";
  ?>
