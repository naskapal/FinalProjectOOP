<?php

class Club{

  private $_db;

  public function __construct()
  {
    $this->_db = Database::getInstance();
  }

  public function club_list()
  {
    return $this->_db->select('club');
  }

  public function club_details($value)
  {
    return $this->_db->get_info('club','club_id',$value);
  }

  public function login_club($username, $password)
  {
    $data = $this->_db->get_info('club', 'username', $username);

    if(password_verify($password, $data['password']))
      return true;
    else return false;
  }

  public function cek_name($username)
  {
    $data = $this->_db->get_info('club', 'username', $username);

    if(empty($data)) return false;
    else return true;
  }

}

 ?>
