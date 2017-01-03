<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init_inside.php";

if(!$_student->is_LoggedIn()){
    header('location: ../login.php');
}

$result = $_club->club_list();






require_once "../templates/header_student.php";
 ?>

<!-- content -->

<div class="col-lg-12">
  <!-- Service Panels -->
         <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
         <div class="row">
             <div class="col-lg-12">
                 <h2 class="page-header">Student Club List</h2>
             </div>

             <?php
             if($result ->num_rows > 0){
                while($row = $result->fetch_assoc()){?>

                  <div class="col-md-3 col-sm-6">
                      <div class="panel panel-default text-center">
                          <div class="panel-heading">
                              <span class="fa-stack fa-5x">
                                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                    <img src="<?php echo '../assets/img/club/'.$row['imagepath'].'.png';?>" class="fa fa-stack-1x fa-inverse"></i>

                              </span>
                          </div>
                          <div class="panel-body">
                              <h4><?php echo $row['club_name']; ?></h4>
                              <p><?php echo $row['club_desc']; ?></p>
                              <a href="<?php echo 'club_details.php?club_id='.$row['club_id']; ?>" class="btn btn-primary">Learn More</a>
                          </div>
                      </div>
                  </div>



            <?php
                }
             }
              ?>





         </div>
</div>






 <?php
require_once "../templates/footer_student.php";
  ?>
