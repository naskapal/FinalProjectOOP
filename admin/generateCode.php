<?php

include_once $_SERVER['DOCUMENT_ROOT']."/FinalProjectOOP/core/init_inside.php";

if(!$_admin->is_LoggedIn()){
    header('location: adminLogin.php');
}

if (Input::get('generate'))
{
  $test = $_admin->generateWalletCode(Input::get('nominal'));

   $j= 0;
   for ($i = 0 ;$i < 3; $i++)
   {
   	$code = substr($test, $j, 4);
   	echo $code;
   	$j = $j + 4;
   	if ($i != 2)
   	{
   		echo " - ";
   	}
   }
}
?>
