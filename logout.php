<?php

require_once $_SERVER['DOCUMENT_ROOT']."/core/init.php";
session_destroy();
Redirect::to('login');

?>
