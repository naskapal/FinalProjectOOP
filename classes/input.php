<?php

class Input{

  public static function get($value)
  {
    if(isset($_POST[$value])){
      return $_POST[$value];
    }else if(isset($_GET[$value])){
      return $_GET[$value];
    }
  }
}

 ?>
