<?php
require('../config.php');
if(!$_admin->is_LoggedIn()){
    header('location: index.php');
}

if (Input::get('generate'))
{
  $test = $_admin->generateWalletCode(Input::get('nominal'));
  $savedCode="";
   $j= 0;
   for ($i = 0 ;$i < 3; $i++)
   {
   	$code = substr($test, $j, 4);
   	$savedCode .= $code;
   	$j = $j + 4;
   	if ($i != 2)
   	{
   		$savedCode .=" - ";
   	}
   }
}

 ?>

 <!-- Page Heading/Breadcrumbs -->
 <div class="row">
     <div class="col-lg-12">
         <h1 class="page-header">Generate Code
         </h1>
         <ol class="breadcrumb">
             <li><a href="index.html">Home</a>
             </li>
             <li class="active">Generate Code</li>
         </ol>
     </div>
 </div>



 <form action="admin-page.php?cek=generate" method="post">
   <select name="nominal">
     <option value=10000>10000</option>
     <option value="25000">25000</option>
   </select>
   <input type="submit" name="generate" value="generate">
 </form>


<?php
if (isset($savedCode))
echo $savedCode;
include_once '../assets/adminFooter.php';
 ?>
