<?php
require('../config.php');

if(!$student->is_LoggedIn()){
    header('location: ../login.php');
}

$id=$_GET['club_id'];

$data = $_club->club_details($id);

require_once "../templates/header_student.php";
 ?>

<!-- content -->

<!-- Page Content -->
   <div class="container">

       <!-- Page Heading/Breadcrumbs -->
       <div class="row">
           <div class="col-lg-12">
               <h1 class="page-header"><?php echo $data['club_name'];?>
               </h1>
               <ol class="breadcrumb">
                   <li><a href="index.html">Home</a>
                   </li>
                   <li class="active">Portfolio Item</li>
               </ol>
           </div>
       </div>
       <!-- /.row -->

       <!-- Portfolio Item Row -->
       <div class="row">

           <div class="col-md-6">

             <img class="img-responsive img-hover center-block" src="<?php echo '../assets/img/club/'.$data['imagepath'];?>" alt="gambar">

           </div>

           <div class="col-md-6">
               <h3>Club Description</h3>
               <p class="text-justify"><<?php echo $data['club_desc']; ?></p>
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
