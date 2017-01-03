<?php include_once $_SERVER['DOCUMENT_ROOT']."/FinalProjectOOP/core/init_inside.php";

  include_once '../core/init_inside.php';
  if(!$_admin->is_LoggedIn()){
      header('location: adminLogin.php');
  }
?>
<?php include_once '../assets/adminHeader.php'; ?>

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        // //  include "../checkAdmin.php";
                        // $cek=$_GET['cek'];
                        // if($_GET['cek']=="user")
                        // {
                        //     include"view-user.php";
                        //     }
                        // elseif($_GET['cek']=="event")
                        // {
                        //     include"view-event.php";
                        //     }
                        // elseif($_GET['cek']=="generate")
                        // {
                        //     include"generate.php";
                        //     }
                        // elseif($_GET['cek']=="input")
                        // {
                        //     include"form-user.php";
                        //     }
                        // elseif($_GET['cek']=="trans")
                        // {
                        //     include"view-transaction.php";
                        //     }
		              ?>
                    </div>
                </div>
                <!-- /.row -->
<?php include_once '../assets/adminFooter.php'; ?>
