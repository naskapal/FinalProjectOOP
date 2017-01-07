<?php
require('../config.php');
include_once '../assets/adminHeader.php';

if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}
?>
<div class="row">
    <div class="col-lg-12">
        <?php
//                        include "../checkAdmin.php";
        $cek = isset($_GET['cek']) ? $_GET['cek'] : 'telolet';

        if($cek =="user")
        {
            include "view-user.php";
            }
        elseif($cek=="event")
        {
            include "view-event.php";
            }
        elseif($cek=="generate")
        {
            include "generate.php";
            }
        elseif($cek=="input")
        {
            include "form-user.php";
            }
        elseif($cek=="trans")
        {
            include "view-transaction.php";
        }
        else{
          include "admin-hello.php";
        }
      ?>
    </div>
</div>
                <!-- /.row -->
<?php include_once '../assets/adminFooter.php'; ?>
