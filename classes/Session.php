<?php

class Session{

  public static function exist($name)
  {
      return (isset($_SESSION[$name])) ? true : false;
  }

  public static function set($name, $value)
  {
    return $_SESSION[$name] = $value;
  }

  public static function get($name)
  {
    return $_SESSION[$name];
  }

  public static function flash($name, $pesan = '')
  {
    if(self::exist($name)){
      $session = self::get($name);
      self::delete($name);
      return $session;
    }else {
      self::set($name, $pesan);
    }
  }

  public static function delete($name)
  {
    if(self::exist($name)){
      unset($_SESSION[$name]);
    }
  }

}
 ?>
