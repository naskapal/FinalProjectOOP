<?php
require('../config.php');
require_once MYFOLDER_PATH."/core/init.php";
session_destroy();
Redirect::to('index');

?>
