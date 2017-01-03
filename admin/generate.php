<?php
include_once '../assets/adminHeader.php';
include_once '../core/init_inside.php';

if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
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
 <form action="generate.php" method="post">
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
